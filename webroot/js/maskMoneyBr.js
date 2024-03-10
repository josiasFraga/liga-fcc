(function($) {
    $.fn.maskMoneyBr = function() {
        // Função para formatar o valor monetário
        function formatMoney(value) {
            // Separação da parte inteira e decimal
            var parts = value.toString().split('.');
            var intPart = parts[0];
            var decimalPart = parts.length > 1 ? ',' + parts[1] : '';

            // Adiciona ponto para separar milhares
            intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Retorna o valor formatado
            return intPart + decimalPart;
        }

        // Evento de input
        $(this).on('input', function() {
            // Remove caracteres não numéricos, exceto a vírgula para permitir valores decimais
            var value = $(this).val().replace(/[^0-9,]/g, '');

            // Remove zeros à esquerda
            value = value.replace(/^0+/, '');

            // Se não houver nada ou apenas uma vírgula, insere um zero à esquerda
            if (value === '' || value === ',') {
                value = '0';
            }

            // Se houver mais de um zero à esquerda, remove os extras
            if (value.length > 1 && value.charAt(0) === '0' && value.charAt(1) !== ',') {
                value = value.substring(1);
            }

            // Atualiza o valor no campo
            $(this).val(formatMoney(value));
        });

        // Evento de foco
        $(this).on('focus', function() {
            // Remove a formatação para permitir a edição
            var value = $(this).val().replace(/[,.]/g, '');
            $(this).val(value);
        });

        // Evento de perda de foco
        $(this).on('blur', function() {
            // Se o valor termina com vírgula, adiciona zeros decimais
            if ($(this).val().endsWith(',')) {
                $(this).val($(this).val() + '00');
            }
        });
    };
})(jQuery);