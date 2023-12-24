<div class="myContainer">
    
    <div class="infoCategoryAdmin">
        <div class="row">
        <div class="col-2">
            <table>
                <?php foreach ($categorys as $item) : ?>
                    <tr>
                        <td><?= $item->name; ?></td>
                        <td class="count"><?= $countInCategory[$item->id] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-2">
            <table>
                <tr>
                    <td>Всего изображений</td>
                    <td><?= $total; ?></td>
                </tr>
                <tr>
                    <td>Всего лайков</td>
                    <td><?= $total_Like; ?></td>
                </tr>
                <tr>
                    <td>Всего просмотров</td>
                    <td><?= $total_View; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-6">
            <table>
                <?php foreach ($slogans as $item) : ?>
                    <tr>
                        <td><?= $item->text; ?></td>
                        <td class="views"><?= $item->views; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        </div>
    </div>

</div>
