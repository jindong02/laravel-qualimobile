$(document).ready(function () {

    var idCor = 1;
    function HTML() {
        idCor = idCor + 1;

        html = '<div id="cor_' + idCor + '" class="row d-flex align-items-center cor">';
        html += '                                    <div class="col-4">';
        html += '                                        <div class="form-group">';
        html += '                                            <label class="form-label">Nome da cor</label>';
        html += '                                            <input type="text" class="form-control form-control-sm" name="cores[' + idCor + '][nome]" value="" required="">';
        html += '                                        </div>';
        html += '                                    </div>';
        html += '                                    <div class="col-4">';
        html += '                                        <div class="form-group">';
        html += '                                            <label class="form-label">Material</label>';
        html += '                                            <input type="text" class="form-control form-control-sm" name="cores[' + idCor + '][material]" value="" required="">';
        html += '                                        </div>';
        html += '                                    </div>';
        html += '                                    <div class="col-2">';
        html += '                                        <div class="form-group">';
        html += '                                            <label class="form-label">HEX</label>';
        html += '                                            <input type="color" class="form-control form-control-sm" name="cores[' + idCor + '][hex]" value="#563d7c" required="">';
        html += '                                        </div>';
        html += '                                    </div>';
        html += '                                    <div class="col-2">';
        html += '                                        <a href="javascript:void(0)" data-id="' + idCor + '" class="btn btn-sm btn-danger remover rounded-0">';
        html += '                                            X';
        html += '                                        </a>';
        html += '                                    </div>';
        html += '                                </div>';

        return html;
    }


    $("#add-cor").click(function () {
        if (idCor <= 6) {
            $("#Cores").append(HTML());
        }
    });

    $("body").on("click", ".remover", function () {
        idCor = idCor - 1;
        $(this).parents(".cor").remove();
    });
});
