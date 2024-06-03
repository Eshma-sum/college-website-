<div class="py-5 bg-color border-top" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="footer-heading text-success fw-bolder">
                    <?= webSetting('title') ?? 'Siddha Public College'; ?>
                </h4>
                <hr/>
                <p>
                    <?= webSetting('small_description') ?? 'Siddha Public College'; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h4 class="footer-heading">
                    Contact Information
                </h4>
                <hr>
                <p>Address: <?= webSetting('address') ?? ''; ?></p>
                <p>Phone: <?= webSetting('phone') ?? ''; ?></p>
                <p>Mobile: <?= webSetting('mobile1') ?? ''; ?>, <?= webSetting('mobile2') ?? ''; ?></p>
                <p>Email: <?= webSetting('email1') ?? ''; ?>, <?= webSetting('email2') ?? ''; ?></p>
                    <div class="d-flex justify-content-center justify-content-lg-start gap-5 mt-lg-0">
                        <?php
                                $socialMedia = getAll('social_medias');
                                if($socialMedia)
                                {
                                     if(mysqli_num_rows($socialMedia)>0)
                                    {
                                        foreach($socialMedia as $socialItem)
                                        {
                                            $name = $socialItem['name'];
                                            if ($name == 'facebook')
                                            {
                                                ?>
                                                <a href="<?= $socialItem['url']?>"><i class="fa-brands fa-facebook"></i></a>
                                                <?php
                                            }
                                            if ($name == 'instagram')
                                            {
                                                ?>
                                                <a href="<?= $socialItem['url']?>"><i class="fa-brands fa-instagram"></i></a>
                                                <?php
                                            }
                                            if ($name == 'twitter')
                                            {
                                                ?>
                                                <a href="<?= $socialItem['url']?>"><i class="fa-brands fa-twitter"></i></a>
                                                <?php
                                            }
                                        }
                                      
                                    }
                                    else
                                    {
                                        echo "No Social Media added";
                                    }
                                }
                                else
                                {
                                    echo "something went wrong";
                                }


                                ?>
                        </div>
               
            </div>
            <div class="col-md-4 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3516.43650469246!2d83.98568439678957!3d28.194047800000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595be80002d1d%3A0x443231a8a79b44c9!2z4KS44KS_4KSm4KWN4KSnIOCkquCkrOCljeCksuCkv-CklSDgpJXgpLLgpYfgpJwg4KSq4KWL4KSW4KSw4KS-!5e0!3m2!1sen!2snp!4v1715124960028!5m2!1sen!2snp"  width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="container">
                <hr class="container mx-auto text-light-grey">

                <div class="row text-light-grey">
                    <div class="col-md-12 text-center">
                        Copyright ©2024 All rights reserved. |<span class="bg-theme"> Kusum Pun</span>                       
                    </div>
                </div>
        </div>
    </div>
</div>
<a href="#" class="gotop">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</a>

