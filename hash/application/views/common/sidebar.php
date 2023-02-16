<?php 
    if(!isset($this->session->userdata[SESSION_NAME]))
        {redirect('Welcome');}
    
    $segment=$this->uri->segment(1);
    
    $adminDetails = $this->Users_model->get_single("users","id='".$_SESSION[SESSION_NAME]['id']."'");
?>
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="javascript:void(0)">Project Test</a>
                        <a href="javascript:void(0)" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url(); ?>assetsNew/assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url(); ?>assetsNew/assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>  
                            <div class="profile-data">
                                <div class="profile-data-name"><?= ucfirst($adminDetails->name);?></div>
                                <div class="profile-data-title"><?= ucfirst($adminDetails->user_type);?></div>
                            </div>
                            <div class="profile-controls">
                                <a href="javascript:void(0)" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="javascript:void(0)" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="<?php if ($segment==DASHBOARD) { echo " active"; } ?>">
                        <a href="<?php echo site_url(DASHBOARD)?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>
                    <li class="<?php if ($segment==USERS) { echo " active"; } ?>">
                        <a href="<?= site_url(USERS); ?>"><span class="fa fa-user"></span> <span class="xn-text"> Manage Admin Users</span></a>
                    </li>                    
                    <!-- <li class="xn-openable <//?php if ($segment==ENQUIRIES || $segment==CARRERS || $segment==FRANCHISEE ) { echo "active"; } ?>">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Masters</span></a>
                        <ul>
                            
                            <li class="<//?php if ($segment==ENQUIRIES) { echo " active"; } ?>">
                                <a href="<//?= site_url(ENQUIRIES); ?>"><span class="fa fa-clock-o"></span> <span class="xn-text">Enquiries</span></a>
                            </li> 
                            <li class="<//?php if ($segment==CARRERS) { echo " active"; } ?>">
                                <a href="<//?= site_url(CARRERS); ?>"><span class="fa fa-file"></span> Career</a>
                            </li>
                            <li class="<//?php if ($segment==FRANCHISEE) { echo " active"; } ?>">
                                <a href="<//?= site_url(FRANCHISEE); ?>"><span class="fa fa-users"></span>Franchise</a>
                            </li>                       
                        </ul>
                    </li> -->
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>