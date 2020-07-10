<?php include 'layouts/header.php' ?>

<div class="row pb-5 mb-3 justify-content-center">
    <div class="col-md-8 order-md-last mb-3 preview" id="preview">
        <label class="mb-2">Preview certificate : </label>
        <img src="" class="img-fluid" id="img-preview" crossorigin="anonymous">
        <canvas id="canvas" width="100%"></canvas>
    </div>
    <div class="col-md-4 order-md-first">
        <form action="pdf.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="certificate" class="form-label">Upload certificate</label>
                <div class="form-file">
                    <input type="file" class="form-file-input" name="certificate" id="certificate" accept="image/*" onchange="loadImage(event)">
                    <label class="form-file-label" for="customFileLong">
                        <span class="form-file-text">Format: jpg, Size: A4</span>
                        <span class="form-file-button">Browse</span>
                    </label>
                </div>
            </div>
            <div class="options" id="options">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="fsize" class="form-label">Font size</label>
                        <input type="number" name="fsize" id="fsize" class="form-control" oninput="editCanvas()">
                    </div>
                    <div class="col-sm-6">
                        <label for="y" class="form-label">Coordinate Y</label>
                        <input type="number" name="y" id="y" class="form-control" oninput="editCanvas()">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="names" class="form-label">List of names</label>
                    <textarea name="names" id="names" cols="30" rows="10" class="form-control" placeholder="Enter names in here, example : &#10;&#10;Shinomiya Kaguya&#10;Hayasaka Ai&#10;Shirogane Miyuki&#10;Ishigami Yuu"></textarea>
                </div>
                <div class="mb-4">
                    <small>*** Sometimes the font size in preview section not same as in pdf, so don't be bored to try.</small>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">🚀 Generate!!</button>&nbsp;
                    <a href="/" class="btn btn-outline-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'layouts/footer.php' ?>