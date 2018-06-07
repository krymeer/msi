<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('barcode__section_main_title'); ?>
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('barcode__section_main_text'); ?>
    </div>
    <div id="barcode-error">
    
    <?php if (isset($this->session->barcode_err)): ?>
        <div class="alert error">
            <?php echo sprintf($this->lang->line('barcode__db_err')[$this->session->barcode_err[0]], $this->session->barcode_err[1]); ?>
        </div>
    <?php endif; ?>

    </div>
    <input type="file" id="barcode-file-input">
    <div id="barcode-img-box">
        <div class="barcode-sec" id="barcode-add-sec">
            <i class="fas fa-plus-circle" id="barcode-add-img"></i>
            <div>
                <?php echo $this->lang->line('barcode__input_add_img'); ?>
            </div>
        </div>
        <div class="barcode-sec" id="barcode-img-sec">
            <div id="barcode-img-wrapper">
                <img id="barcode-img">
                <i class="fas fa-trash" id="barcode-delete-img"></i>
            </div>
            <div id="barcode-img-filename"></div>
        </div>
    </div>
</section>

<script src="<?php echo asset_url(); ?>js/quagga.min.js"></script>
<script>
    function getEAN(imgData) {
        $('#barcode-error').html('');

        Quagga.decodeSingle({
            decoder: {
                readers: ['ean_reader']
            },
            locate: true,
            src: imgData
        }, function(result) {
            if (typeof result !== 'undefined' && result.codeResult)
            {
                window.location.href = '/catalog/ean/' + result.codeResult.code;
            }
            else 
            {
                $('#barcode-error').append($('<div/>').addClass('alert error').text(<?php echo "'". $this->lang->line('barcode__input_ean_not_found')."'"; ?>));
            }
        });
    }

    function handleFileInput() {
        $('#barcode-file-input').change(function() {
            $('#barcode-error').html('');

            if ($(this)[0].files.length > 0) {
                var file = $(this)[0].files[0];

                if (file.type.startsWith('image/'))
                {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function(e) {
                        $('#barcode-img').attr('src', e.target.result);
                        $('#barcode-img-filename').text(file.name);
                        $('#barcode-add-sec').css('display', 'none');
                        $('#barcode-img-sec').css('display', 'grid');
                        getEAN(e.target.result);
                    };
                }
                else
                {
                    $('#barcode-error').append($('<div/>').addClass('alert error').text(<?php echo "'". $this->lang->line('barcode__input_invalid_type')."'"; ?>));
                }
            }
        });
    }

    function removeImage() {
        $('#barcode-error').html('');
        $('#barcode-file-input').val('');
        $('#barcode-img').attr('src', '');
        $('#barcode-img-filename').text('');
        $('#barcode-img-sec').css('display', 'none');
        $('#barcode-add-sec').css('display', 'grid');
    }


    $(function() {
        handleFileInput();

        $('#barcode-img-box').on('click', function() {
            if ($('#barcode-add-sec').css('display') !== 'none')
            {
                $('#barcode-file-input').trigger('click');
            }
            else
            {
                removeImage();
            }
        });
    });
</script>