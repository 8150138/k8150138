<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 06.10.2017
 * Time: 1:27
 */
?>
<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
?>
</div>
</div>
<!-- end main content -->

<!-- start big footer -->
<div class="big-footer">
    <div class="top-shadow-footer"><!--  --></div>
    <div class="containit">

        <div class="full-width clearfix">
            <div class="one-fourth panel">
                <div class="padleft">
                    <h4>Lorem Ipsum</h4>
                    <ul>
                        <li><a href="#">Nulla vel lorem</a></li>
                        <li><a href="#">Porttitor orci vulputate</a></li>

                        <li><a href="#">Placerat mollis</a></li>
                        <li><a href="#">Suscipit risus felis</a></li>
                        <li class="last"><a href="#">Nullam ligula felis</a></li>
                    </ul>
                </div>
            </div>
            <div class="one-fourth panel border-vert-left">

                <div class="padleft">
                    <h4>Lorem Ipsum</h4>
                    <ul>
                        <li><a href="#">Nulla vel lorem</a></li>
                        <li><a href="#">Porttitor orci vulputate</a></li>
                        <li><a href="#">Placerat mollis</a></li>
                        <li><a href="#">Suscipit risus felis</a></li>

                        <li class="last"><a href="#">Nullam ligula felis</a></li>
                    </ul>
                </div>
            </div>
            <div class="one-fourth panel border-vert-left">
                <div class="padleft">
                    <h4>Contact</h4>
                    <p>Curabitur placerat, urna eu fringilla placerat, urna eu venenatis</p>

                    <b class="big">T: 800-232-2321</b><br/>
                    <b class="big">F: 800-231-2313</b><br/>
                    <a href="#">lorem@misum.com</a><br/>
                </div>
            </div>
            <div class="one-fourth-last panel border-vert-left newsletter">
                <div class="padleft">

                    <h4>Join Our<br/> Newsletter</h4>
                    <p>Curabitur placerat, urna eu fringilla venenatis, orci mi tincidunt nulla, vitae iaculis augue.</p>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td><input name="" class="field"/></td>
                            <td><input type="image" name="go" src="<?=SITE_TEMPLATE_PATH;?>/images/newsletter-input-button.png" alt="Go" class="form-imagebutton" /></td>
                        </tr>

                    </table>
                    <span class="small">Lorem ipsum <a href="#">dorem mors</a>.</span>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- end big footer -->

<!-- start small footer -->
<div class="small-footer">
    <div class="containit">

        <div class="copy">Copyright &copy; <? echo date("Y");?> .</div>

        <?$APPLICATION->IncludeComponent("bitrix:news.list", "society",
            false
        );?>


<div class="clear"></div>
</div>
</div>
<!-- end start small footer -->
<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>