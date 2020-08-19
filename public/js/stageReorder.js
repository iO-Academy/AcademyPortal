const stageTableRows = document.querySelectorAll('#stageTable tr');
const stageTable = document.getElementById('stageTable');
var requestData = {
    "data" : []
};

new Sortable(stageTable, {
    animation: 150,
    // handle: '.order',
    store: {
        set: async function (sortable) {
            let stageOrder = sortable.toArray();
            requestData.data = [];

            stageTableRows.forEach((tableRow)=>{
                let stageEntity = {};
                stageEntity.id = tableRow.dataset.id;
                stageEntity.title = tableRow.querySelector('.stageTitle').textContent;
                stageEntity.order = (stageOrder.indexOf(tableRow.dataset.id) + 1);
                stageEntity.student = tableRow.querySelector('[name="student"]').checked;
                requestData.data.push(stageEntity);
            });
            await sendRequest('./api/updateStages', 'PUT', requestData);
            location.reload();
        },
    }
});