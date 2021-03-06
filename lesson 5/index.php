<?php
require 'db.php';


$image = mysqli_query($db, "SELECT * FROM image ORDER BY rating DESC");

$result = array();
while($row = mysqli_fetch_assoc($image)) {
    $result[] = $row;
}

$messages = [
    'ok' => 'Файл загружен',
    'error' => 'Ошибка загрузки',
    'size' => 'Размер файла больше чем 0.5мб',
    'type' => 'Неверный тип файла, требуется JPEG',
    'duplicate' => 'Картинка с таким названием уже есть',
    'no_file' => 'Нет файла'
];

$message = isset($_GET['message'])? $messages[$_GET['message']]: '';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2>Моя галерея</h2>
    <div >
        <p class="mb-2"><?=$message?></p>
        <div class="mb-3">
            <form class="row" action="upload/upload.php" method="post" enctype="multipart/form-data">
                <div class="col-auto">
                    <input type="file" class="form-control" id="formFile" name="image">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary " type="submit">Загрузить</button>
                </div>
            </form>
        </div>
    </div>
    <hr>

    <div class="d-flex flex-wrap justify-content-between">
        <?php foreach($result as $img):?>
            <div class="card m-2 text-center" style="width: 16rem;">
                <img src="gallery_img/small/<?=$img['filename']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="btn-group">
                        <button id="like" data-id="<?=$img['id']?>" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-heart"></i>
                            <span class="badge bg-danger"><?=$img['rating']?></span>
                        </button>
                        <a href="./photo.php?id=<?=$img['id']?>" target="_blank" class="btn btn-sm btn-outline-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>

    <a href="data/update.php">Обновить базу фотографий</a>
</div>
<script>
    const photos = document.querySelectorAll('#like')
    photos.forEach(photo => {
        photo.addEventListener('click', event => {
            updateRating(event.currentTarget.dataset.id)
        })
    })

    function updateRating(id) {
        axios.post(`./update_rating.php`, {
            'id': id
        })
        setTimeout(function(){
            location.reload();
        }, 500);
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>