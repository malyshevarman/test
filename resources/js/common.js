

$('.input-daterange').datepicker({
    startDate: moment().subtract(30, 'days').format('DD.MM.YYYY'),
    endDate: moment().format(),
    language: "ru",
});
