<?php
    /**
     * @var $topic_data
     * @var $location_id
     */
?>

<div id="countdown"></div>
<input class="form-control m-5" id="topic_name--input" type="text">
<input type="hidden" id="topic_id" value="<?= $topic_data['topic_id'] ?>">
<input type="hidden" id="location_id" value="<?= $location_id ?>">
<p id="topic_para--alert"></p>
<button class="btn btn-primary" id="btn_answer--submit" style="margin-left: 40px">Submit</button>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.topicCountDown) {
            topicCountDown('<?= $topic_data['time_end'] ?>')
        }
    });
</script>

