<?php
class project
{	
	public $unapproved_project;
	public function __construct()
    {
        $this->unapproved_project = $this->get_projects( 'unapproved', null, true );
    }

    function get_all_projects($limit =null , $offset = null) {
    	global $database;
    	$sql = "SELECT * FROM projects ORDER BY projects.id DESC";

    	if (isset($limit) && isset($offset)) $sql.=" LIMIT $limit OFFSET $offset";
    	$result = $database->select_all_query( $sql );
		return $result;
    }

    function get_projects( $filter, $paged = null, $notification = null ) {
    	global $database,$user;
    	$sql = 'SELECT projects.id,projects.author,projects.title,projects.description,projects.date,projects.status FROM projects';

    	$cat = isset( $_GET['cat'] ) ? $_GET['cat'] : null;
    	if ( $cat ) {
    		$sql .= ' INNER JOIN term_project ON projects.id = term_project.project_id';
    	}

    	switch ( $filter ) {
    		case 'all':
    			$sql .= ' WHERE projects.status="PUBLISH"';
    			break;
    		case 'unapproved':
    			$sql .= ' WHERE projects.status="PENDING"';
    			break;
    		case 'your-project':
    			$current_user = $_SESSION['id'];
    			$sql .= ' WHERE projects.status="PUBLISH" AND projects.author="'.$current_user.'"';
    			break;
    		case 'assigned':
    			$current_user = $_SESSION['id'];
    			$sql .= ' INNER JOIN project_meta ON projects.id = project_meta.project_id WHERE projects.status="PUBLISH" AND project_meta.meta_key="assignees" AND project_meta.meta_value="'.$current_user.'"' ;
	   			break;
    		default:
    			# code...
    			break;
    	}

    	if ( $cat ) {
    		$sql .= ' AND term_project.term_id='.$cat;
    	}

    	$search = isset( $_GET['s'] ) ? $_GET['s'] : null;
    	if ( !$notification ) {
	    	if ( $search ) {
	    		$sql .= ' AND projects.title LIKE "%'.$search.'%"';
	    	}
	    }


    	if ( !$search || $notification ) {
    		if ( $paged ) {
    		
	    		if ( '1' == $paged) {
	    			$sql .= ' LIMIT 5' ;
	    		} else {
	    			$paging = 5*( intval( $paged )-1);
	    			$sql .= ' LIMIT 5 OFFSET '.$paging ;
	    		}
	    	}
    	}
    	
    	$result = $database->select_all_query( $sql );
		return $result;
    }

    function get_most_view_projects() {
    	global $database;
    	$sql = "SELECT DISTINCT projects.id FROM projects INNER JOIN project_meta ON projects.id = project_meta.project_id ORDER BY FIELD( project_meta.meta_value , 'views' ) DESC LIMIT 5";
    	$result = $database->select_all_query( $sql );
		return $result;
    }

    function get_project_by_id( $project_id ) {
		global $database;
		$sql = "SELECT * From projects WHERE id=".$project_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_all_projects_by_category( $cat_id = null ) {
		global $database;
		$sql = "SELECT * FROM projects
			INNER JOIN categories_projects ON projects.id = categories_projects.project_id
			INNER JOIN categories ON categories.id = categories_projects.category_id";
		if ( $cat_id ) {
		  $sql .= " WHERE categories.id =" .$cat_id;
		}
		$result = $database->select_all_query( $sql );
		return $result;
	  }

    function get_projects_by_dep( $dep_id = null, $limit=null, $offset=null ) {
        global $database;
        $sql = "SELECT projects.* FROM projects 
                INNER JOIN project_meta on project_meta.project_id=projects.id AND project_meta.meta_key='dep' 
                WHERE project_meta.meta_value='$dep_id' ORDER BY projects.id DESC";
        if (isset($limit) && isset($offset)) $sql .= " LIMIT $limit OFFSET $offset";
        $result = $database->select_all_query( $sql );
        return $result;
    }
	function get_all_category() {
		global $database;
		$sql = "SELECT * FROM categories" ;
		$result = $database->select_all_query( $sql );
		return $result;
	}
    function get_all_popular_category()
    {
        global $database;
        $sql = "SELECT categories.*, count(categories_projects.category_id)as num From categories 
                LEFT JOIN categories_projects ON categories_projects.category_id = categories.id
                GROUP BY categories_projects.category_id
                ORDER BY count(categories_projects.category_id) DESC LIMIT 5
                " ;
        $result = $database->select_all_query( $sql );
        return $result;
    }
    function get_num_by_cat_id($cat_id)
    {
        global $database;
        $sql = "SELECT count(*) as num FROM categories_projects WHERE category_id='$cat_id'";
        $result = $database->select_query($sql);
        return $result;
    }

	function slugify($string, $replace = array(), $delimiter = '-') {
	  if (!extension_loaded('iconv')) {
		throw new Exception('iconv module not loaded');
	  }
	  // Save the old locale and set the new locale to UTF-8
	  $oldLocale = setlocale(LC_ALL, '0');
	  setlocale(LC_ALL, 'en_US.UTF-8');
	  $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	  if (!empty($replace)) {
		$clean = str_replace((array) $replace, ' ', $clean);
	  }
	  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	  $clean = strtolower($clean);
	  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	  $clean = trim($clean, $delimiter);
	  // Revert back to the old locale
	  setlocale(LC_ALL, $oldLocale);
	  return $clean;
	}

	function get_category_by( $word, $type ) {
		global $database;
		$sql = "SELECT * FROM categories WHERE $type='$word'";
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function check_exist( $word, $type ) {
		$result = $this->get_category_by( $word, $type );
		if ( $result ) {
			return true;
		} else {
			return false;
		}
	}

	function delete_category( $cat_id ) {
		global $database;
		$sql = 'DELETE FROM categories WHERE id = "'.$cat_id.'"';
		$database->execute_query( $sql );
	}

	function insert_project( $array ) {
		$new_project = $this->_insert_project( $array );
		foreach ( $array['assignee'] as $assignee ) {
			$this->add_project_meta( $new_project, 'assignees' , $assignee );
		}

		foreach ( $array['cat'] as $cat ) {
			$this->add_project_to_category( $new_project, $cat );
		}

		return $new_project;
	}


	function add_project_to_category( $project, $cat ) {
		global $database;
		$sql = "INSERT INTO term_project( `project_id`, `term_id` )
		VALUES ('" . $project . "', '" . $cat . "')";
		$database->execute_query( $sql );
	}

	function _insert_project( $array ) {
		global $database;
    	$sql = "INSERT INTO projects( `author`, `title`, `description`, `date`, `status`  )
			VALUES ('" . $array['author'] . "', '" . $array['title'] . "', '" . $array['desc'] . "', '" . date("Y-m-d H:i:s") . "', '" . $array['status'] . "')";
    	$result = $database->execute_query_return_result( $sql );
    	return $result;
	}

	function add_project_meta( $id, $key, $value ) {
		global $database;
    	$sql = "INSERT INTO project_meta( `project_id`, `meta_key`, `meta_value`  )
			VALUES ('" . $id . "', '" . $key . "', '" . $value . "')";
		$database->execute_query( $sql );
	}

	function get_project_meta( $id, $key, $plural ) {
		global $database;
    	$sql = 'SELECT * FROM project_meta WHERE project_id='.$id.' AND meta_key="'.$key.'"';
    	$result = $database->select_all_query( $sql );
    	if ( $result ) {
    		if ( $plural ) {
    			foreach ( $result as $res ) {
    				$r[] = $res['meta_value'];
    			}
    		} else {
    			$res = $result[0];
    			$r = $res['meta_value'];
    		}
    		
    	} else {
    		$r = false;
    	}
    	return $r;
	}

	function update_project_meta( $id, $key, $value ) {
		global $database;
    	$sql = 'UPDATE project_meta SET meta_value = "'.$value.'"  WHERE project_id = '.$id.' AND meta_key = "'.$key.'"';
    	$database->execute_query( $sql );
	}
	

	function get_cats( $project_id ) {
		global $database;
		$sql = "SELECT terms.id,terms.name,terms.color FROM terms
			INNER JOIN term_project ON terms.id = term_project.term_id
			INNER JOIN projects ON projects.id = term_project.project_id
			WHERE projects.id =".$project_id;
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function approve_project( $project_id ) {
		global $database;
    	$sql = 'UPDATE projects SET status = "publish"  WHERE id = '.$project_id;
    	$database->execute_query( $sql );
	}

	function delete_project( $project_id ) {
		global $database;
		$sql = 'DELETE FROM projects WHERE id = "'.$project_id.'"';
		$database->execute_query( $sql );
	}
	function get_all_project_from_topic( $topic_id ) {
		global $database;
		$sql = 'SELECT * FROM project_meta INNER JOIN projects ON projects.id = project_meta.project_id  WHERE project_meta.meta_key ="topic" AND project_meta.meta_value = "'.$topic_id.'"  ORDER BY projects.date DESC LIMIT '.$limit;
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function get_project_from_topic( $topic_id ,$paged = null ) {
		global $database;
		$sql = 'SELECT * FROM project_meta INNER JOIN projects ON projects.id = project_meta.project_id  WHERE project_meta.meta_key ="topic" AND project_meta.meta_value = "'.$topic_id.'"  ORDER BY projects.date DESC';
		if ( $paged ) {
			$sql += ' OFFSET 5';
		}
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function get_project_categories( $project_id ) {
		global $database;
		$sql = 'SELECT * FROM categories_projects INNER JOIN projects ON categories_projects.project_id = projects.id INNER JOIN categories ON categories_projects.category_id = categories.id WHERE projects.id=' .$project_id;
		$result = $database->select_all_query( $sql );
		return $result;
	}



	function update_vote( $post, $user, $action ) {
		$thumbup = $this->get_project_meta( $post, 'thumbup', false );
		$thumbdown = $this->get_project_meta( $post, 'thumbdown', false );
		switch ( $action ) {
			case 'thumb-up':
				$down = array();
				$down = array();
				if ( $thumbdown && $thumbdown != '' ) {
					$thumbdown_arr = explode( ',' , $thumbdown );
					if ( in_array( $user , $thumbdown_arr ) ) {
						$remove = array_search( $user , $thumbdown_arr );
						if ( $remove !== false ) {
							unset($thumbdown_arr[ $remove ]);
						}
						$down = $thumbdown_arr;
						$down = implode( ',', $down );
						// remove thumb_down user
						$this->update_project_meta( $post, 'thumbdown', $down );
						if ( !$thumbup || $thumbup == '' ) {
							$up[] = $user;
						} else {
							$thumbup_arr = explode( ',' , $thumbup );
							$thumbup_arr[] = $user;
							$blank = array_search( '', $thumbup_arr );
							if ( $blank !== false) {
								unset( $thumbup_arr[ $blank ]);
							}
							$up = $thumbup_arr;
						}
					} else {
						if ( !$thumbup || $thumbup == '' ) {
							$up[] = $user;
						} else {
							$thumbup_arr = explode( ',' , $thumbup );
							if ( !in_array( $user , $thumbup_arr ) ) {
								$thumbup_arr[] = $user;
							}
							$blank = array_search( '', $thumbup_arr );
							if ( $blank !== false ) {
								unset( $thumbup_arr[ $blank ]);
							}
							$up = $thumbup_arr;
						}
					}
				} else if ( !$thumbup || $thumbup == '' ) {
					$up[] = $user;
				} else {
					$thumbup_arr = explode( ',' , $thumbup );
					if ( !in_array( $user , $thumbup_arr ) ) {
						$thumbup_arr[] = $user;
					} else {
						die();
					}
					$up = $thumbup_arr;
				}
				$blank = array_search( '', $up );
				if ( $blank !== false ) {
					unset( $up[ $blank ]);
				}
				$up = implode( ',', $up );
				$this->update_project_meta( $post, 'thumbup', $up );
				break;

			case 'thumb-down':
				$up = array();
				$down = array();
				if ( $thumbup && $thumbup != '' ) {
					$thumbup_arr = explode( ',' , $thumbup );

					if ( in_array( $user , $thumbup_arr ) ) {
						$remove = array_search( $user , $thumbup_arr );
						if ( $remove !== false ) {
							unset($thumbup_arr[ $remove ]);
						}
						$up = $thumbup_arr;
						$up = implode( ',', $up );
						// remove thumb_up user
						$this->update_project_meta( $post, 'thumbup', $up );
						if ( !$thumbdown || $thumbdown == '' ) {
							$down[] = $user;
						} else {
							$thumbdown_arr = explode( ',' , $thumbdown );
							$thumbdown_arr[] = $user;
							$blank = array_search( '', $thumbdown_arr );
							if ( $blank !== false ) {
								unset( $thumbdown_arr[ $blank ]);
							}
							$down = $thumbdown_arr;
						}
					} else {
						if ( !$thumbdown || $thumbdown == '' ) {
							$down[] = $user;
						} else {
							$thumbdown_arr = explode( ',' , $thumbdown );
							if ( !in_array( $user , $thumbdown_arr ) ) {
								$thumbdown_arr[] = $user;
							}
							$blank = array_search( '', $thumbdown_arr );
							if ( $blank !== false ) {
								unset( $thumbdown_arr[ $blank ]);
							}
							$down = $thumbdown_arr;
						}
					}
				} else if ( !$thumbdown || $thumbdown == '' ) {
					$down[] = $user;
				} else {
					$thumbdown_arr = explode( ',' , $thumbdown );
					if ( !in_array( $user , $thumbdown_arr ) ) {
						$thumbdown_arr[] = $user;
					} else {
						die();
					}
					$down = $thumbdown_arr;
				}
				$blank = array_search( '', $down );
				if ( $blank !== false ) {
					unset( $down[ $blank ]);
				}
				$down = implode( ',', $down );
				$this->update_project_meta( $post, 'thumbdown', $down );
				break;
		}

		$up = $this->get_project_meta( $post, 'thumbup', false );
		$down = $this->get_project_meta( $post, 'thumbdown', false );

		if ( !$up || '' == $up ) {
			$total_up = 0;
		} else {
			$total_up = count( explode( ',', $up ) );
		}
		
		if ( !$down || '' == $down ) {
			$total_down = 0;
		} else {
			$total_down = count( explode( ',', $down ) );
		}
		$total_fav = 1000- intval( $total_up ) - intval( $total_down );
		$this->update_project_meta( $post, 'total_fav', $total_fav );
}

	function get_popular_projects() {
		global $database;
    	$sql = "SELECT DISTINCT projects.id FROM projects INNER JOIN project_meta ON projects.id = project_meta.project_id ORDER BY RAND() DESC LIMIT 5";
    	$result = $database->select_all_query( $sql );
		return $result;
	}
}
$GLOBALS['project'] = new project();