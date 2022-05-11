// いいね機能
$(function() {
    let good = $('.good-toggle');
    good.on('click', function() {
        let $this = $(this);
        let goodTravelId = $this.data('travel-id');
        $.ajax({
            headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            url: '/good',
            method: 'POST',
            data: {'travel_id': goodTravelId},
        })
        .done(function(res){
            $this.toggleClass('liked');
            $this.next('.good-counter').html(res.travel_goods_count);
        })
        .fail(function(){
            // console.log('fail');
        });
    });
});

// /create
$(function () {
    $(document).on('change keyup keydown paste cut',
        'textarea', function () {
        if ($(this).outerHeight() > this.scrollHeight) {
            $(this).height(1)
        }
        while ($(this).outerHeight() < this.scrollHeight) {
            $(this).height($(this).height() + 1)
        }
    });

    $(document).on('click', '.note-add', function () {
        $('.note-add').before(`
                <div class="guide-note box border px-2 py-2 mb-3 shadow-sm">
                <input type="text" name="note-title[]" class="w-100 mb-2" placeholder="タイトル(例 持ち物)">
                <textarea name="note-body[]" class="w-100" rows="" placeholder="内容(例 スマホ・・・)"></textarea>
                </div>`
        );
    })



    function addCodeBody(day){
        return `<div class="guide-body box shadow-sm">
                    <div class="guide-wrapper">
                        <div class="body-left">
                            <select name="day` + day + `destination[]" id="destination" class="">
                                <option value=""></option>
                                <option value="徒歩">徒歩</option>
                                <option value="車">車</option>
                                <option value="バス">バス</option>
                                <option value="電車">電車</option>
                                <option value="新幹線">新幹線</option>
                                <option value="飛行機">飛行機</option>
                            </select>
                        </div>
                        <div class="body-right">
                            <div class="body-top ">
                                <input type="time" name="day` + day + `time[]" class="body-time guide-form">
                                <input type="text" name="day` + day + `bodyTitle[]" class="body-title guide-form" placeholder="タイトル(例 出発)">
                            </div>
                            <div class="body-bottom">
                                <textarea class="w-100" name="day` + day + `bodyDetail[]" rows="" placeholder="詳細"></textarea>
                            </div>
                        </div>
                    </div>
                </div>`;
    };

    $(document).on('click', '.addBtn', function () {
        let num = $(this).attr('id');
        let count = num.substr(8);
        $('#body-add' + count).before(addCodeBody(count));
    });

    let day = $('#maxDay').val();
    $(document).on('click', '#addDate', function () {
        day++;
        $('#maxDay').val(day);
        $('#addDateBefore').before(`
                    <h2 class="my-4">
                        <input type="date" name="date[]" class="col-3">
                    </h2>
                    `
                    + addCodeBody(day) +
                    `
                    <div class="text-center">
                        <span id="body-add` + day + `"` + `class= "addBtn"></span>
                    </div>
                    `);
    });
});

// /confirm
$(function(){
    $('.copyURL').val(location.href);
    $('#copyButton').click(function() {
        $('.copyURL').select();
        document.execCommand('Copy');
        alert('コピーしました\n' + $('.copyURL').val());
    });
});

// mypage
$(function () {
    $('#my-favorite').hide();
    $('#past-create').click(function () {
        $('#favorite-list').removeClass('selected');
        $('#past-create').addClass('selected');
        $('.section').not('#my-brochures').hide();
        $('#my-brochures').show();
    });
    $('#favorite-list').click(function () {
        $('#past-create').removeClass('selected');
        $('#favorite-list').addClass('selected');
        $('.section').not('#my-favorite').hide();
        $('#my-favorite').show();
    });
});

$(function(){
    let $delete = $('.delete-btn');
    $delete.on('click', function(){
        if(window.confirm('削除しますか？')){
            let $this = $(this);
            let deleteTravelId = $this.data('travel-id');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/delete-brochure',
                method: 'POST',
                data: { 'travel_id': deleteTravelId },
            })
            .done(function(res){
                $this.parents('.model-banner').remove();
                $('.post-count').text(res.post_count);
            })
            .fail(function(res){
                console.log(res);
            })
        } else {
        }
    })
});
