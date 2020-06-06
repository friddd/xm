$(document).ready(function() {
    $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    $('.history-form').validetta({
        validators: {
            regExp: {
                symbol : {
                    pattern : /^[A-Z]{2,5}$/,
                    errorMessage : 'Invalid symbol.'
                },
                date : {
                    pattern : /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/,
                    errorMessage : 'Invalid date format.'
                }
            },
            callback: {
                start: {
                    callback:  function( el, value ) {
                        let startDate = Date.parse(value);
                        let currentDate = Date.parse(new Date().toISOString().slice(0,10));
                        if (startDate > currentDate) {
                            return false;
                        }
                        else if ($('#end_date').val().length > 0) {
                            let endDate = Date.parse($('#end_date').val());
                            if (startDate > endDate) {
                                return false;
                            }
                        }
                        return true;
                    },
                    errorMessage: "Invalid start date."
                },
                end: {
                    callback:  function( el, value ) {
                        let endDate = Date.parse(value);
                        let currentDate = Date.parse(new Date().toISOString().slice(0,10));
                        if (endDate > currentDate) {
                            return false;
                        }
                        else if ($('#start_date').val().length > 0) {
                            let startDate = Date.parse($('#start_date').val());
                            if (startDate > endDate) {
                                return false;
                            }
                        }
                        return true;
                    },
                    errorMessage: "Invalid end date."
                },
            }
        },
        realTime : true
    });
});
