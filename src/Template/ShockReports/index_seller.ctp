<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShockReport[]|\Cake\Collection\CollectionInterface $shockReports
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
                    <h3><?= __('Your Shock Reports') ?></h3>
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
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $shockReport->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shockReport->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shockReport->id], ['confirm' => __('Are you sure you want to delete the report #{0}?', $shockReport->id)]) ?>
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
                <div class="col col-md-8">
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
        let originalDataset = <?php
            echo json_encode($shockReports);
        ?>;
        let index = 1;
        let newDataset = [];
        console.log(originalDataset);
        originalDataset.forEach(element => {
            let newElement = {
                quantity: element["damage_amount"],
                name: element["shock_type"]==null ? "Other" : element["shock_type"]["name"],
                id: index++
            }
            newDataset.push(newElement);
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
            donutContainer.datum(newDataset).call(donutChart);
            legendContainer.datum(newDataset).call(legendChart);
        }
    </script>
</div>
