const reportForm = document.querySelector('#report-form');
const startBtn = document.querySelector( '#run-btn');
const table = document.querySelector('#table')

const getFormSubmission = () => {
    return {
        reportStart: reportForm.elements['start-date'].value,
        reportEnd: reportForm.elements['end-date'].value,
        reportCategory: reportForm.elements['report-category'].value,
    }
}

startBtn.addEventListener('click', e => {
    e.preventDefault()
    const reportSubmission = getFormSubmission();

    const extractResponseData = (response) => {
        return response.json();
    }

    const options = {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    }

    const url = './api/getApplicantReports/' + reportSubmission.reportStart + '/' + reportSubmission.reportEnd + '/' + reportSubmission.reportCategory;

    const getReportData = async () => {
        const response = await fetch(url, options);
        return await extractResponseData(response);
    }

    createReportTable(getReportData);
})

const createReportTable = (reportData) => {

};