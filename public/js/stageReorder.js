const stageTableRows = document.querySelectorAll('#stageTable tr');
const stageTable = document.getElementById('stageTable');
var requestData = {
    "data" : []
};

Sortable.create(stageTable, {
    animation: 150,
    ghostClass: 'blue-background-class',
    group: "localStorage",
    store: {
        set: function (sortable) {
            let stageOrder = sortable.toArray();
            requestData.data = [];

            stageTableRows.forEach((tableRow)=>{
                let stageEntity = {};
                stageEntity.id = tableRow.dataset.id;
                stageEntity.title = tableRow.children[1].children[0].textContent;
                stageEntity.order = (stageOrder.indexOf(tableRow.dataset.id) + 1);
                requestData.data.push(stageEntity);
                location.reload()
            });
            sendRequest('/api/updateStages', 'PUT', requestData)
        },
    }
});