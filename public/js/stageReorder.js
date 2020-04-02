import Sortable from './Sortable';

const stageTableRows = document.querySelectorAll('.stageRow');
const stageTable = document.getElementById('stageTable');
var requestData = {
    "data" : []
};

var sortable = Sortable.create(stageTable, {
    animation: 150,
    ghostClass: 'blue-background-class',

    onEnd: function (evt) {
        evt.newIndex;  // element's new index within new parent

        stageTableRows.forEach((tableRow)=>{
            let stageEntity = {};
            stageEntity.id = tableRow.dataset.id;
            stageEntity.title = tableRow.firstElementChild.textContent;
            stageEntity.order = evt.newIndex;

        })
    },
}