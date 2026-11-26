<!DOCTYPE html>
<html lang="id">
    <body>
        hello<br>
        {{$kategori}}<br>
        {{$x}}
        <pre>
            <?php
            print_r($xarray ?? []);
            ?>
            {{$xarray[0]}}<br>
            {{$xarray[1]}}<br>
            {{$xarray[2]}}<br>
            {{$xarray[3]}}<br>
        </pre>
        <?php
        print_r ($xarray ?? []);
        ?>
        {{$yarray['nama1']}}<br>
        @foreach ($xarray as $yy)
        {{$yy}}<br>
        @endforeach

        @foreach ($items as $item)
        {{$item['nama']}}
        @endforeach
    </body>
</html>