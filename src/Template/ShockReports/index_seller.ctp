<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShockReport[]|\Cake\Collection\CollectionInterface $shockReports
 * @var \App\Model\Entity\ShockReport[]|\Cake\Collection\CollectionInterface $shockReportsUnprocessed
 * @var \App\Model\Entity\ShockReport[]|\Cake\Collection\CollectionInterface $shockReportsProcessed
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?= $this->element("sidebar");?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <h3><?= __('Your Unprocessed Shock Reports') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('shock_type_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Other specification') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('damage_amount') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($shockReportsUnprocessed as $shockReport): ?>
                            <tr>
                                <td><?= $this->Number->format($shockReport->id) ?></td>
                                <td><?= $shockReport->has('shock_type') ? $this->Html->link($shockReport->shock_type->name, ['controller' => 'ShockTypes', 'action' => 'view', $shockReport->shock_type->id]) : 'Other' ?></td>
                                <td><?= h($shockReport->shock_type_other) ?></td>
                                <td><?= $this->Number->currency($shockReport->damage_amount) ?></td>
                                <td><?= $shockReport->has('user') ? $this->Html->link($shockReport->user->email, ['controller' => 'Users', 'action' => 'view', $shockReport->user->id]) : '' ?></td>
                                <td><?= h($shockReport->created_date===null?"":$shockReport->created_date->format('Y-m-d H:i:s')) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $shockReport->id], ["class"=>"btn btn-sm btn-primary"]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shockReport->id], ["class"=>"btn btn-sm btn-warning"]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shockReport->id], ['confirm' => __('Are you sure you want to delete the report #{0}?', $shockReport->id), "class"=>"btn btn-sm btn-danger"]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div>
                </div>
            </div>
            <!-- charts -->
            <div class="row">
                <div class="col col-md-4 offset-md-3">
                    <div id="yourShockReportsUnprocessedPieChartContainer">
                    </div>
                </div>
                <div class="col col-md-4">
                    <div id="yourShockReportsUnprocessedPieChartLegend">
                    </div>
                </div>
            </div>
            <!-- Processed reports -->
            <div class="row">
                <div class="col">
                    <h3><?= __('Your Processed Shock Reports') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('shock_type_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Other specification') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('damage_amount') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('processed_date') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($shockReportsProcessed as $shockReport): ?>
                            <tr>
                                <td><?= $this->Number->format($shockReport->id) ?></td>
                                <td><?= $shockReport->has('shock_type') ? $this->Html->link($shockReport->shock_type->name, ['controller' => 'ShockTypes', 'action' => 'view', $shockReport->shock_type->id]) : 'Other' ?></td>
                                <td><?= h($shockReport->shock_type_other) ?></td>
                                <td><?= $this->Number->currency($shockReport->damage_amount) ?></td>
                                <td><?= $shockReport->has('user') ? $this->Html->link($shockReport->user->email, ['controller' => 'Users', 'action' => 'view', $shockReport->user->id]) : '' ?></td>
                                <td><?= h($shockReport->created_date===null?"":$shockReport->created_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($shockReport->processed_date===null?"":$shockReport->processed_date->format('Y-m-d H:i:s')) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $shockReport->id], ["class"=>"btn btn-sm btn-primary"]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shockReport->id], ["class"=>"btn btn-sm btn-warning"]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div>
                </div>
            </div>
            <!-- charts -->
            <div class="row">
                <div class="col col-md-4 offset-md-3">
                    <div id="yourShockReportsProcessedPieChartContainer">
                    </div>
                </div>
                <div class="col col-md-4">
                    <div id="yourShockReportsProcessedPieChartLegend">
                    </div>
                </div>
            </div>
            <!-- All reports -->
            <div class="row">
                <div class="col">
                    <h3><?= __('All your Shock Reports') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('shock_type_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Other specification') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('damage_amount') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('processed_date') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($shockReports as $shockReport): ?>
                            <tr>
                                <td><?= $this->Number->format($shockReport->id) ?></td>
                                <td><?= $shockReport->has('shock_type') ? $this->Html->link($shockReport->shock_type->name, ['controller' => 'ShockTypes', 'action' => 'view', $shockReport->shock_type->id]) : 'Other' ?></td>
                                <td><?= h($shockReport->shock_type_other) ?></td>
                                <td><?= $this->Number->currency($shockReport->damage_amount) ?></td>
                                <td><?= $shockReport->has('user') ? $this->Html->link($shockReport->user->email, ['controller' => 'Users', 'action' => 'view', $shockReport->user->id]) : '' ?></td>
                                <td><?= h($shockReport->created_date===null?"":$shockReport->created_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($shockReport->processed_date===null?"":$shockReport->processed_date->format('Y-m-d H:i:s')) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $shockReport->id], ["class"=>"btn btn-sm btn-primary"]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shockReport->id], ["class"=>"btn btn-sm btn-warning"]) ?>
                                    <?= $shockReport->processed_date != null ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $shockReport->id], ['confirm' => __('Are you sure you want to delete the report #{0}?', $shockReport->id), "class"=>"btn btn-sm btn-primary"]) : "" ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div>
                </div>
            </div>
            <!-- charts -->
            <div class="row mb-5">
                <div class="col col-md-4 offset-md-3">
                    <div id="yourShockReportsPieChartContainer">
                    </div>
                </div>
                <div class="col col-md-4">
                    <div id="yourShockReportsPieChartLegend">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let originalDatasetUnprocessed = <?php
            echo json_encode($shockReportsUnprocessed);
        ?>;
        let indexUnprocessed = 1;
        let newDatasetUnprocessed = [];
        //crea il nuovo dataset condensando i tipi di shock
        originalDatasetUnprocessed.forEach(element => {
            oldElementDamageAmount = element["damage_amount"];
            oldElementType = element["shock_type"]==null ? "Other" : element["shock_type"]["name"];

            if(newDatasetUnprocessed.some((newElement)=>{return newElement.name == oldElementType;})){
                newDatasetUnprocessed.forEach(el=>{
                    if(el.name == oldElementType){
                        el.quantity += oldElementDamageAmount;
                    }
                });
            } else {
                newDatasetUnprocessed.push({
                    quantity: oldElementDamageAmount,
                    name: oldElementType
                });
            }
        });
        //ordina in ordine decrescente per quantità
        newDatasetUnprocessed.sort((a, b)=>{
            return a.quantity < b.quantity ? 1 : 
                a.quantity > b.quantity ? -1 : 0;
        });
        //assegna l'id in modo crescente
        newDatasetUnprocessed.forEach(el=>{
            el["id"] = indexUnprocessed++;
        });
        if(newDatasetUnprocessed.length > 0){
            let donutContainer = d3.select("#yourShockReportsUnprocessedPieChartContainer");
            let legendContainer = d3.select("#yourShockReportsUnprocessedPieChartLegend");
            let containerWidth = donutContainer.node().getBoundingClientRect().width;
            let donutChart = britecharts.donut();
            let legendChart = britecharts.legend();
            donutChart
                .isAnimated(true)
                .highlightSliceById(1)
                .width(containerWidth)
                .height(containerWidth)
                .externalRadius(containerWidth/2.5)
                .internalRadius(containerWidth/5)
                .on('customMouseOver', function(data) {
                    legendChart.highlight(data.data.id);
                })
                .on('customMouseOut', function() {
                    legendChart.clearHighlight();
                });
            legendChart.numberFormat(",.2f");
            donutContainer.datum(newDatasetUnprocessed).call(donutChart);
            legendContainer.datum(newDatasetUnprocessed).call(legendChart);
        }
    </script>
    <script>
        let originalDatasetProcessed = <?php
            echo json_encode($shockReportsProcessed);
        ?>;
        let indexProcessed = 1;
        let newDatasetProcessed = [];
        //crea il nuovo dataset condensando i tipi di shock
        originalDatasetProcessed.forEach(element => {
            oldElementDamageAmount = element["damage_amount"];
            oldElementType = element["shock_type"]==null ? "Other" : element["shock_type"]["name"];

            if(newDatasetProcessed.some((newElement)=>{return newElement.name == oldElementType;})){
                newDatasetProcessed.forEach(el=>{
                    if(el.name == oldElementType){
                        el.quantity += oldElementDamageAmount;
                    }
                });
            } else {
                newDatasetProcessed.push({
                    quantity: oldElementDamageAmount,
                    name: oldElementType
                });
            }
        });
        //ordina in ordine decrescente per quantità
        newDatasetProcessed.sort((a, b)=>{
            return a.quantity < b.quantity ? 1 : 
                a.quantity > b.quantity ? -1 : 0;
        });
        //assegna l'id in modo crescente
        newDatasetProcessed.forEach(el=>{
            el["id"] = indexProcessed++;
        });
        if(newDatasetProcessed.length > 0){
            let donutContainer = d3.select("#yourShockReportsProcessedPieChartContainer");
            let legendContainer = d3.select("#yourShockReportsProcessedPieChartLegend");
            let containerWidth = donutContainer.node().getBoundingClientRect().width;
            let donutChart = britecharts.donut();
            let legendChart = britecharts.legend();
            donutChart
                .isAnimated(true)
                .highlightSliceById(1)
                .width(containerWidth)
                .height(containerWidth)
                .externalRadius(containerWidth/2.5)
                .internalRadius(containerWidth/5)
                .on('customMouseOver', function(data) {
                    legendChart.highlight(data.data.id);
                })
                .on('customMouseOut', function() {
                    legendChart.clearHighlight();
                });
            legendChart.numberFormat(',.2f');
            donutContainer.datum(newDatasetProcessed).call(donutChart);
            legendContainer.datum(newDatasetProcessed).call(legendChart);
        }
    </script>
    <script>
        let originalDataset = <?php
            echo json_encode($shockReports);
        ?>;
        let index = 1;
        let newDataset = [];
        //crea il nuovo dataset condensando i tipi di shock
        originalDataset.forEach(element => {
            oldElementDamageAmount = element["damage_amount"];
            oldElementType = element["shock_type"]==null ? "Other" : element["shock_type"]["name"];

            if(newDataset.some((newElement)=>{return newElement.name == oldElementType;})){
                newDataset.forEach(el=>{
                    if(el.name == oldElementType){
                        el.quantity += oldElementDamageAmount;
                    }
                });
            } else {
                newDataset.push({
                    quantity: oldElementDamageAmount,
                    name: oldElementType
                });
            }
        });
        //ordina in ordine decrescente per quantità
        newDataset.sort((a, b)=>{
            return a.quantity < b.quantity ? 1 : 
                a.quantity > b.quantity ? -1 : 0;
        });
        //assegna l'id in modo crescente
        newDataset.forEach(el=>{
            el["id"] = index++;
        });
        if(newDataset.length > 0){
            let donutContainer = d3.select("#yourShockReportsPieChartContainer");
            let legendContainer = d3.select("#yourShockReportsPieChartLegend");
            let containerWidth = donutContainer.node().getBoundingClientRect().width;
            let donutChart = britecharts.donut();
            let legendChart = britecharts.legend();
            donutChart
                .isAnimated(true)
                .highlightSliceById(1)
                .width(containerWidth)
                .height(containerWidth)
                .externalRadius(containerWidth/2.5)
                .internalRadius(containerWidth/5)
                .on('customMouseOver', function(data) {
                    legendChart.highlight(data.data.id);
                })
                .on('customMouseOut', function() {
                    legendChart.clearHighlight();
                });
            legendChart.numberFormat(',.2f');
            donutContainer.datum(newDataset).call(donutChart);
            legendContainer.datum(newDataset).call(legendChart);
        }
    </script>
</div>
