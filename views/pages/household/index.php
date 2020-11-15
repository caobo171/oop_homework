<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="container mt-4">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Số nhà</th>
        <th scope="col">Phố</th>
        <th scope="col">Huyện/Thị xã</th>
        <th scope="col">Tỉnh/Thành phố</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $item) :?>
        <tr>
        <td><?php echo $item->house_no ?></td>
        <td><?php echo $item->house_street ?></td>
        <td><?php echo $item->house_ward ?></td>
        <td><?php echo $item->house_city ?></td>
        <td><a href="<?php echo URLROOT;?>/household/edit/<?php echo $item->id?>">Edit</a></td>
        <td>
            <form action="<?php echo URLROOT;?>/household/delete/<?php echo $item->id ?>" method="post">
                <input type="submit" value="Delete" >
            </form>
        </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>