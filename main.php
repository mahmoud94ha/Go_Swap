<style>
    section {

    }
</style>
<section class="boudi">
<?php
        session_start();

        $title = "Main";

        include 'init.php';
?>

<div class="w3-container" style="width:-webkit-fill-available;">
<?php
        if(isset($_SESSION["id"])){
        $interests = explode(" ",$_SESSION["interests"]);    
        $rand_interest = array_rand($interests);
        if(!empty(trim($interests[$rand_interest]))){    
        $items = getInterest($interests[$rand_interest], $_SESSION["id"]);           
        if(!empty($items)){ 
?>        
        
      <div class="w3-card w3-white w3-margin-top w3-padding">
          <h4 class="w3-text-teal w3-margin"><b><?php echo lang("AD-SUGGESTIONS") ?>..</b></h4>
            <div class="w3-row-padding">
<?php
        foreach($items as $item){   ?>

            <div class="w3-quarter w3-margin-bottom w3-center w3-animate-zoom" id="<?php echo $item["itemID"] ?>">
            <div class="w3-border-bottom w3-border w3-hover-shadow">    
            <div class="w3-display-container" >
            <div class="img-container">    
<?php
            if(!empty(trim($item["image"]))){   ?>
                <img class="" src="uploads/items_images/<?php echo $item["image"] ?>" style="width:100%">
<?php
                                            }
                else{
                    
                    echo '<img src="uploads/items_images/ads.png" style="width:100%">';
                    
                }
            ?>
                </div>
<?php if(strtotime($item["add_date"]) > strtotime('- 7 days')){                 
                echo '<span class="w3-tag w3-display-topleft w3-teal">'. lang("NEW") . '</span>';
            }
                ?>
                <span class="w3-tag w3-display-topright w3-teal"><?php echo $item["status"] ?> /5</span>                
                <h4 class="w3-padding w3-nowrap"><?php echo $item["item_name"] ?></h4>
                <p class="w3-text-teal"><i class="fa fa-tag fa-fw"></i><b><?php echo $item["price"] ?> TND</b></p>
                <p class="w3-opacity w3-nowrap"><?php echo proDate($item["add_date"]) ?></p>                  
                
                <div class="w3-display-middle w3-display-hover">
                    <a href="showAd.php?itemID=<?php echo $item["itemID"] ?>" class="w3-button w3-teal"><?php echo lang("FULL-DETAILS") ?> <i class="fa fa-plus-circle"></i></a>
                </div>
                
            </div>
                <div class="w3-row">
        <?php 

                $citem = $item["itemID"];
                if(isset($_SESSION["id"])) $user = $_SESSION["id"];            
                $list = getAllFrom("*","likes","WHERE itemID = '$citem' AND userID = '$user'");
                if(count($list) > 0){ ?>    
                    <a href="<?php echo $func ?>update.php?u=rlike&itemID=<?php echo $item["itemID"] ?>&userID=<?php echo $user ?>"><div class="w3-third w3-text-teal w3-padding w3-hover-teal w3-nowrap"><i class="fa fa-fw fa-check"></i><?php echo countItems("*","likes",true,"itemID",$item["itemID"]) ?>
                        </div>
                    </a>
<?php                    
                }
                    else {   ?>
                    
                    <a href="<?php echo $func ?>update.php?u=alike&itemID=<?php echo $item["itemID"] ?>&userID=<?php echo $user ?>">
                    <div class="w3-third w3-text-grey w3-padding w3-hover-teal w3-nowrap"><i class="far fa-fw fa-thumbs-up"></i><?php echo countItems("*","likes",true,"itemID",$item["itemID"]) ?>
                        </div>
                    </a>
                    
<?php                    
                    }
                    
                ?>                         
                    
                    <div class="w3-third w3-text-grey w3-padding w3-nowrap"><i class="fa fa-fw fa-eye"></i><?php echo $item["views"] ?></div>                    
                    <a href="showAd.php?itemID=<?php echo $item["itemID"] ?>#demo"><div class="w3-third w3-text-grey w3-padding w3-hover-teal w3-nowrap"><i class="fa fa-fw fa-comments"></i><?php echo countItems("comID","comments",true,"itemID",$item["itemID"]) ?></div></a>
                </div>                 

                </div>
            
            </div>
                

<?php            
        }
        ?>
          </div>
      </div>
      <br>
<?php }
        }
        }
    
else {  ?>
    
<!-- Header -->
<header class="w3-container w3-center site-header w3-margin-top w3-round" style="padding:48px 16px">
  <h1 class="w3-margin w3-text-teal" style="font-size: -webkit-xxx-large;">GO SWAP</h1>
  <p class="w3-xlarge"><?php echo lang("SITE-HEAD-MSG") ?></p>
  <a href="login.php" class="w3-button w3-teal w3-padding-large w3-large w3-margin-top"><?php echo lang("GET-INVOLVED") ?></a>
</header>    
    
    
<?php } ?>

<div class="w3-row-padding w3-light-grey" style="margin:auto;">    
<div class="w3-twothird">
<?php
    
    $items = getMostViewed2() ;
          
    if(!empty($items)){      
          ?>
    <div class="w3-row-padding w3-white w3-card w3-margin w3-padding-32">
    <h4 class="w3-#4cc9f0 w3-center w3-margin-bottom"><b><?php echo lang("MOST-CONSULTED") ?></b></h4>    
<?php
        foreach($items as $item){   ?>
        
            <div class="w3-third w3-margin-bottom w3-center w3-animate-zoom" id="<?php echo $item["itemID"] ?>">
            <div class="w3-border-bottom w3-border w3-hover-shadow">    
            <div class="w3-display-container" >
            <div class="img-container">    
<?php
            if(!empty(trim($item["image"]))){   ?>
                <img class="" src="uploads/items_images/<?php echo $item["image"] ?>" style="width:100%">
<?php
                                            }
                else{
                    
                    echo '<img src="uploads/items_images/ads.png" style="width:100%">';
                    
                }
            ?>
                </div>
<?php if(strtotime($item["add_date"]) > strtotime('- 7 days')){                 
                echo '<span class="w3-tag w3-display-topleft w3-teal">'. lang("NEW") . '</span>';
            }
                ?>
                <span class="w3-tag w3-display-topright w3-teal"><?php echo $item["status"] ?> /5</span>                
                <h4 class="w3-padding w3-nowrap"><?php echo $item["item_name"] ?></h4>
                <p class="w3-text-teal w3-nowrap"><i class="fa fa-tag fa-fw"></i><b><?php echo $item["price"] ?> TND</b></p>
                <p class="w3-opacity w3-nowrap"><?php echo proDate($item["add_date"]) ?></p>                  
                
                <div class="w3-display-middle w3-display-hover">
                    <a href="showAd.php?itemID=<?php echo $item["itemID"] ?>" class="w3-button w3-teal"><?php echo lang("FULL-DETAILS") ?> <i class="fa fa-plus-circle"></i></a>
                </div>
                
            </div>
                <div class="w3-row">
        <?php 

                $citem = $item["itemID"];
                if(isset($_SESSION["id"])) $user = $_SESSION["id"];            
                $list = getAllFrom("*","likes","WHERE itemID = '$citem' AND userID = '$user'");
                if(count($list) > 0){ ?>    
                    <a href="<?php echo $func ?>update.php?u=rlike&itemID=<?php echo $item["itemID"] ?>&userID=<?php echo $user ?>"><div class="w3-third w3-text-teal w3-padding w3-hover-teal w3-nowrap"><i class="fa fa-fw fa-check"></i><?php echo countItems("*","likes",true,"itemID",$item["itemID"]) ?>
                        </div>
                    </a>
<?php                    
                }
                    else {   ?>
                    
                    <a href="<?php echo $func ?>update.php?u=alike&itemID=<?php echo $item["itemID"] ?>&userID=<?php echo $user ?>">
                    <div class="w3-third w3-text-grey w3-padding w3-hover-teal w3-nowrap"><i class="far fa-fw fa-thumbs-up"></i><?php echo countItems("*","likes",true,"itemID",$item["itemID"]) ?>
                        </div>
                    </a>
                    
<?php                    
                    }
                    
                ?>                         
                    
                    <div class="w3-third w3-text-grey w3-padding w3-nowrap"><i class="fa fa-fw fa-eye"></i><?php echo countItems("*","user_likes",true,"itemID",$item["itemID"]) ?></div>                    
                    <a href="showAd.php?itemID=<?php echo $item["itemID"] ?>#demo"><div class="w3-third w3-text-grey w3-padding w3-hover-teal w3-nowrap"><i class="fa fa-fw fa-comments"></i><?php echo countItems("comID","comments",true,"itemID",$item["itemID"]) ?></div></a>
                </div>                 


                </div>
            
            </div>
<?php            
        }
        ?>
    </div>
    
<?php
    }
          ?>
    </div>    
<div class="w3-third">    
          <!-- Posts -->
    <div class="w3-white w3-margin-top">
            <div class="w3-container w3-padding w3-teal">
              <h5><?php echo lang("LATEST-ADS-PUBLISHED") ?></h5>
            </div>
    <ul class="w3-ul w3-hoverable w3-white">              
<?php
    
    $latestAds = getAllFrom("*","items","WHERE pending = 1","ORDER BY add_date","DESC","LIMIT 10");
    if(!empty($latestAds)){
        foreach($latestAds as $ad){
        ?>    

          <a href="showAd.php?itemID=<?php echo $ad["itemID"]?>">
              <li class="w3-padding-16">
                <img src="uploads/items_images/<?php echo $ad["image"] ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px; height:50px">
                <span class=""><?php echo $ad["item_name"] ?></span><br>
                <span class="w3-text-teal w3-nowrap"><i class="fa fa-fw fa-tag"></i><?php echo $ad["price"] ?> TND</span>
              </li>
        </a>
              
              
<?php
    }
    }
                  ?>
        </ul>        
    </div>  
          </div> 
</div>    
    
    </div>

</section>