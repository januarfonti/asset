<script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>

<?php
    	echo form_dropdown("id_ruangan",$option_ruangan,'',"class='input-lg selectpicker form-control' data-live-search='true' id='id_ruangan'");
    ?>

    