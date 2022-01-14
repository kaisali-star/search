<script>
    var domainName = 'http://you1ube.herokuapp.com/';

    function CopyToClipboard(datedate) {

        console.log(datedate);
        text = domainName + "?id=" + datedate;
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy"); // Security exception may be thrown by some browsers.
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }
</script>
<?php

use function PHPSTORM_META\type;

function getlinks()
{
    return json_decode(file_get_contents("links.json"), true);
}


function getlinkBydate($date)
{
    $links = getlinks();
    foreach ($links as $link) {
        if ($link['date'] == $date) {
            return $link;
        }
    }
    return null;
}


function deletelink($date)
{
    $links = getlinks();
    foreach ($links as $i => $link) {
        if ($link['date'] == $date) {
            unset($links[$i]);
        };
    };
    $links = json_encode($links);
    file_put_contents('links.json', $links);
}




function getTubeTitel($id)
{

    $jsonURL = file_get_contents("https://noembed.com/embed?url=https://www.youtube.com/watch?v=${id}");
    $json = json_decode($jsonURL);
    $title = $json->{'title'};
    return $title;
}

function get_youtube_thumb($url)
{
    $thumbnail = 'https://img.youtube.com/vi/' . $url . '/default.jpg';
    return $thumbnail;
}
function getTubeId($url)
{
    $id = str_replace("https://www.youtube.com/watch?v=", '', $url);
    return $id;
}

function createlink($newData)
{
    $link = $newData['link'];
    $id = getTubeId($link);
    $thumbnail = get_youtube_thumb($id);
    $title = getTubeTitel($id);

    $newData += ['date' => date("Y-m-d H:i:s"), 'id' => $id, 'thumbnail' => $thumbnail, 'title' => $title];
    $links = getlinks();
    $links[] = $newData;
    $links = json_encode($links);

    file_put_contents('links.json', $links);
    header("location: index.php");
}

function updatelink($data, $date)
{
    $links = getlinks();
    $tubeLink = $data['link'];
    $id = getTubeId($tubeLink);
    $thumbnail = get_youtube_thumb($id);
    $title = getTubeTitel($id);
    $data += ['id' => $id, 'thumbnail' => $thumbnail, 'title' => $title];
    foreach ($links as $i => $link) {
        if ($link['date'] == $date) {
            $links[$i] = array_merge($link, $data);
            $links = json_encode($links);
            file_put_contents('links.json', $links);
        };
    };
}



?>