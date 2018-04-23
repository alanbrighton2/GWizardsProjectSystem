<div id="content" class="tpl-full-width">
    <div id="main-container" class="clearfix">
        <div class="main container submit-container main-container" role="main">
            <div class="content-wrap">
                <div class="main-content container-fluid">
                    <div class="col-xs-12 col-md-12">
                        <div class="panel panel-default">
                           <div class="project-list">
                                <div>
                                    <h3>
                                    <a class="btn btn-primary">
                                        </i> Projects</a>
                                    </a>
                                    </h3>
                                </div>
                                <div class="collapse in">
                                    <?php 
                                        $search_projects = $project->get_projects( 'all', 1 );
                                    ?>
                                    <?php if ( $search_projects ): ?>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ( $search_projects as $search_project ): ?>
                                                <?php 
                                                    $author = $user->get_user_by_id( $search_project['author'] );
                                                ?>
                                                <li class="list-group-item">
                                                    <div class="project-title">
                                                        <a href="http://localhost/GWizardsSystem/project-single.php?id=<?php echo $search_project['id'] ?>"><?php echo $search_project['title'] ?></a>
                                                            - By <?php echo $author['display_name'] ?>
                                                    </div>
                                                    <div class="project-info pull-right">
                                                        <div class="dept">
                                                                <?php
                                                                    $cats = $project->get_cats( $search_project['id'] );
                                                                ?>
                                                                <?php if ( $cats ): ?>

                                                                    <?php foreach ( $cats as $cat ): ?>
                                                                        <a href="http://localhost/GWizardsSystem/project.php?cat=<?php echo $cat['id'] ?>" style="background-color: <?php echo $cat['color'] ?>" class="cat-rdr cat-tag p-com"><?php echo $cat['name']; ?></a>
                                                                    <?php endforeach ?> 
                                                                <?php endif ?>
                                                            </div>
                                                        <div class="date-time"><?php echo date( "F j, Y", strtotime( $search_project['date'] ) ) ?></div>
                                                    </div>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    <?php else: ?>
                                        No Results
                                    <?php endif ?>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
