document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('measurementsForm');

    // Function to clear error messages
    function clearError(elementId) {
        const errorElement = document.getElementById(elementId);
        if (errorElement) {
            errorElement.innerHTML = '';
        }
    }

    // Add event listeners to clear error messages on input
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', function() {
            clearError(input.id + 'Error');
        });
    });

    form.addEventListener('submit', function(event) {
        let hasError = false;

        // Reset previous errors
        form.querySelectorAll('.text-danger').forEach(errorElement => {
            errorElement.innerHTML = '';
        });

        // Validation rules
        const validateRequired = (value, errorElement, message) => {
            if (value.trim() === '') {
                errorElement.innerHTML = message;
                return false;
            }
            return true;
        };

        const validateMeasurement = (value, errorElement, message) => {
            const regex = /^(?:\d{1,2}(?:\s*\d\/\d)?)$/;
            if (!regex.test(value.trim())) {
                errorElement.innerHTML = message;
                return false;
            }
            return true;
        };

        // Validate each field
        

        const lambai = document.getElementById('lambai').value;
        const lambaiError = document.getElementById('lambaiError');
        if (!validateRequired(lambai, lambaiError, 'لمبائی is required') ||
            !validateMeasurement(lambai, lambaiError, 'لمبائی should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const tera = document.getElementById('tera').value;
        const teraError = document.getElementById('teraError');
        if (!validateRequired(tera, teraError, 'تيرا is required') ||
            !validateMeasurement(tera, teraError, 'تيرا should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const bazu = document.getElementById('bazu').value;
        const bazuError = document.getElementById('bazuError');
        if (!validateRequired(bazu, bazuError, 'بازو is required') ||
            !validateMeasurement(bazu, bazuError, 'بازو should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const kundah = document.getElementById('kundah').value;
        const kundahError = document.getElementById('kundahError');
        if (!validateRequired(kundah, kundahError, 'کندها is required') ||
            !validateMeasurement(kundah, kundahError, 'کندها should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const galeh = document.getElementById('galeh').value;
        const galehError = document.getElementById('galehError');
        if (!validateRequired(galeh, galehError, 'گلہ is required') ||
            !validateMeasurement(galeh, galehError, 'گلہ should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const chest = document.getElementById('chest').value;
        const chestError = document.getElementById('chestError');
        if (!validateRequired(chest, chestError, 'چیسٹ is required') ||
            !validateMeasurement(chest, chestError, 'چیسٹ should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const kamar = document.getElementById('kamar').value;
        const kamarError = document.getElementById('kamarError');
        if (!validateRequired(kamar, kamarError, 'کمر is required') ||
            !validateMeasurement(kamar, kamarError, 'کمر should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const chest_tayyar = document.getElementById('chest_tayyar').value;
        const chest_tayyarError = document.getElementById('chest_tayyarError');
        if (!validateRequired(chest_tayyar, chest_tayyarError, 'چیسٹ تیار is required') ||
            !validateMeasurement(chest_tayyar, chest_tayyarError, 'چیسٹ تیار should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const kamartiyaar = document.getElementById('kamartiyaar').value;
        const kamartiyaarError = document.getElementById('kamartiyaarError');
        if (!validateRequired(kamartiyaar, kamartiyaarError, 'كمرتيار is required') ||
            !validateMeasurement(kamartiyaar, kamartiyaarError, 'كمرتيار should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const gohire_tayyar = document.getElementById('gohire_tayyar').value;
        const gohire_tayyarError = document.getElementById('gohire_tayyarError');
        if (!validateRequired(gohire_tayyar, gohire_tayyarError, 'گهیره تیار is required') ||
            !validateMeasurement(gohire_tayyar, gohire_tayyarError, 'گهیره تیار should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const shalwar_lambai = document.getElementById('shalwar_lambai').value;
        const shalwar_lambaiError = document.getElementById('shalwar_lambaiError');
        if (!validateRequired(shalwar_lambai, shalwar_lambaiError, 'شلوار لمبائی is required') ||
            !validateMeasurement(shalwar_lambai, shalwar_lambaiError, 'شلوار لمبائی should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const panche = document.getElementById('panche').value;
        const pancheError = document.getElementById('pancheError');
        if (!validateRequired(panche, pancheError, 'پانچه is required') ||
            !validateMeasurement(panche, pancheError, 'پانچه should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const chokor_ghera = document.getElementById('chokor_ghera').value;
        const chokor_gheraError = document.getElementById('chokor_gheraError');
        if (!validateRequired(chokor_ghera, chokor_gheraError, 'چکور گھیرا is required') ||
            !validateMeasurement(chokor_ghera, chokor_gheraError, 'چکور گھیرا should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const gol_ghera = document.getElementById('gol_ghera').value;
        const gol_gheraError = document.getElementById('gol_gheraError');
        if (!validateRequired(gol_ghera, gol_gheraError, 'گول گھیرا is required') ||
            !validateMeasurement(gol_ghera, gol_gheraError, 'گول گھیرا should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const baba_bazu = document.getElementById('baba_bazu').value;
        const baba_bazuError = document.getElementById('baba_bazuError');
        if (!validateRequired(baba_bazu, baba_bazuError, 'بابا بازو is required') ||
            !validateMeasurement(baba_bazu, baba_bazuError, 'بابا بازو should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const kaff = document.getElementById('kaff').value;
        const kaffError = document.getElementById('kaffError');
        if (!validateRequired(kaff, kaffError, 'كف is required') ||
            !validateMeasurement(kaff, kaffError, 'كف should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const lambai_kot = document.getElementById('lambai_kot').value;
        const lambai_kotError = document.getElementById('lambai_kotError');
        if (!validateRequired(lambai_kot, lambai_kotError, 'لمبائی کوٹ is required') ||
            !validateMeasurement(lambai_kot, lambai_kotError, 'لمبائی کوٹ should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        const hip = document.getElementById('hip').value;
        const hipError = document.getElementById('hipError');
        if (!validateRequired(hip, hipError, 'ہپ is required') ||
            !validateMeasurement(hip, hipError, 'ہپ should be in the format 1, 1/2, or 12 1/2')) {
            hasError = true;
        }

        if (hasError) {
            event.preventDefault();
        }
    });
});
