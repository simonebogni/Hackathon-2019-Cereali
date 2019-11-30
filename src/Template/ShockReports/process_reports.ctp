<?php
/**
 * @var \App\View\AppView $this
 * @var int $count
 * @var \App\Model\Entity\ShockReport[]|\Cake\Collection\CollectionInterface $processedShockReports
 */
    $totalDamageAmount = 0.00;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?= $this->element("sidebar");?>
        </div>
        <div class="col-md-8">
            <div class="row firstPageElement">
                <div class="col">
                    <h3>The system has processed <span class="font-weight-bold"><?= $count == null ? 0 : $count ?></span> reports</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('shock_type') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('shock_type_other') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('damage_amount') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('processed_date') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($processedShockReports as $report){
                                $totalDamageAmount += $report->damage_amount;
                                ?>
                            <tr>
                                <td><?= $this->Number->format($report->id) ?></td>
                                <td><?= $report->has('shock_type') ? $report->shock_type->name : 'Other' ?></td>
                                <td><?= h($report->shock_type_other) ?></td>
                                <td><?= $this->Number->currency($report->damage_amount) ?></td>
                                <td><?= $report->has('user') ? $report->user->email : '' ?></td>
                                <td><?= h($report->created_date===null?"":$report->created_date->format('Y-m-d H:i:s')) ?></td>
                                <td><?= h($report->processed_date===null?"":$report->processed_date->format('Y-m-d H:i:s')) ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- charts -->
            <div class="row mb-5">
                <div class="col col-md-4">
                    <h3><span class="font-weight-bold">Total damage:</span> <?= $this->Number->currency($totalDamageAmount) ?></h3>
                </div>
                <div class="col col-md-4">
                    <div id="yourShockReportsProcessedPieChartContainer">
                    </div>
                </div>
                <div class="col col-md-4">
                    <div id="yourShockReportsProcessedPieChartLegend">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let originalDatasetProcessed = <?php
            echo json_encode($processedShockReports);
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
</div>