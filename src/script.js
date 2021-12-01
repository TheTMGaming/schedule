let yearSelect = document.querySelector('.years');
let monthSelect = document.querySelector('.months');
let daySelect = document.querySelector('.days');

function getDaysCountIn(month)
{
    if (month === 'January' || month === 'March' || month === 'May'
        || month === 'July' || month === 'August' || month === 'October'
        || month === 'December')
    {
        return 31;
    }

    if (month === 'April' || month === 'June' || month === 'September' || month === 'November')
    {
        return 30;
    }

    return new Date(yearSelect.value, 1, 29).getMonth() === 1 ? 29 : 28;
}

function populateDays(month, previousDay)
{
    while (daySelect.firstChild)
        daySelect.removeChild(daySelect.firstChild);

    let days_count = getDaysCountIn(monthSelect.value);
    for (let day = 1; day <= days_count; day++)
    {
        let option = document.createElement('option');
        option.textContent = day.toString();
        daySelect.appendChild(option);
    }

    if (previousDay > days_count)
    {
        daySelect.value = days_count;
        return;
    }

    daySelect.value = previousDay;
}

function populateYears()
{
    let current_year = new Date().getFullYear();

    for (let offset = 30; offset >= -30; offset--)
    {
        let option = document.createElement('option');

        option.textContent = (current_year + offset).toString();
        yearSelect.appendChild(option);
    }

    yearSelect.value = current_year;
}


yearSelect.onchange = function() {
    populateDays(monthSelect.value, daySelect.value);
}

monthSelect.onchange = function() {
    populateDays(monthSelect.value, daySelect.value);
}

populateDays(monthSelect.value, 1);
populateYears();