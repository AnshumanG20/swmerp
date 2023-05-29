		</div> <!-- End boxed -->
        <!--<footer id="footer">
            <p class="pad-lft">&#0169; 2018 Your Company</p>
        </footer>--><!-- END FOOTER -->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <div class="modal fade" id="imagePopUp-lg-modal" role="dialog" tabindex="-1" aria-hidden="true"><!--Large Bootstrap Modal-->
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    </div>
                    <!--Modal body-->
                    <div class="modal-body" style="padding: 5px;">
                        <img src="" class="img-lg imagePopUpPreview" alt="Profile Picture" style="width: 100%; height: 100%;">                    
                    </div>
                </div>
            </div>
        </div><!--End Large Bootstrap Modal-->
</body>
</html>
    <!--JAVASCRIPT-->
    <!--jQuery [ REQUIRED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/jquery.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/bootstrap.min.js"></script>
    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/nifty.min.js"></script>
    <!--[ OPTIONAL ]-->
    <script src="<?=URLROOT;?>/common/assets/plugins/masked-input/jquery.maskedinput.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/otherJs/validation.js"></script>

<script type="text/javascript">
    $('.mask_date').mask('9999-99-99',{placeholder:"yyyy-mm-dd"});
    $('.mask_mobile_no').mask('(999) 999-9999');
    $(function() {
            $('.imagePopUp').on('click', function() {
                $('.imagePopUpPreview').attr('src', $(this).find('img').attr('src'));
                $('#imagePopUp-lg-modal').modal('show');   
            });     
        });
</script>