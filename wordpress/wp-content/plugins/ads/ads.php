<?php
/*
Plugin Name: Quảng Cáo Khóa Học Cao Cấp
Description: Hiển thị Banner quảng cáo chuyên nghiệp với hiệu ứng Glow và Countdown.
Version: 1.2
Author: Vo Van Loi
*/

function get_course_ads_html_combined() {
    $title = get_option('course_title', 'Khóa học lập trình mới nhất');
    $desc  = get_option('course_desc', 'Học từ cơ bản đến nâng cao cùng chuyên gia. Cam kết có việc làm sau khóa học.');
    $img   = get_option('course_image');
    $link  = get_option('course_link', 'https://facebook.com/');

    $icon = $img
        ? '<img src="' . esc_url($img) . '" style="width:50px;height:50px;border-radius:50%;object-fit:cover;border:1.5px solid #d4af37;">'
        : '<div style="width:50px;height:50px;border-radius:50%;background:rgba(212,175,55,0.15);display:flex;align-items:center;justify-content:center;font-size:24px;border:1.5px solid #d4af37;flex-shrink:0;">💻</div>';

    $html = '
    <style>
        @keyframes cad-glow {
            0%,100% { box-shadow: 0 0 0 2px rgba(212,175,55,0.4), 0 6px 24px rgba(180,0,0,0.3); border-color: #d4af37; }
            50%      { box-shadow: 0 0 0 2px rgba(212,175,55,0.8), 0 6px 32px rgba(212,175,55,0.25); border-color: #f5d76e; }
        }
        @keyframes cad-shine {
            0%   { background-position: -300% center; }
            100% { background-position:  300% center; }
        }
        @keyframes cad-pulse {
            0%,100% { opacity: 1; }
            50%      { opacity: 0.5; }
        }
        @keyframes cad-progress {
            from { width: 0%; }
            to   { width: 72%; }
        }
        @keyframes cad-badge {
            0%,100% { transform: scale(1); }
            50%      { transform: scale(1.07); }
        }

        .cad-wrap {
            border: 2px solid #d4af37;
            border-radius: 14px;
            overflow: hidden;
            margin: 14px 0;
            font-family: "Segoe UI", sans-serif;
            background: #1a0a0a;
            animation: cad-glow 2.2s ease-in-out infinite;
            max-width: 420px;
        }
        .cad-top {
            background: linear-gradient(135deg, #6b0000 0%, #a00000 45%, #7a0000 75%, #3d0000 100%);
            padding: 14px 14px 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1.5px solid #d4af37;
            position: relative;
            overflow: hidden;
        }
        .cad-top::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 70% 50%, rgba(212,175,55,0.12) 0%, transparent 70%);
            pointer-events: none;
        }
        .cad-top-info { flex: 1; min-width: 0; }
        .cad-badge {
            display: inline-block;
            background: linear-gradient(90deg, #b8860b, #d4af37, #f5d76e, #d4af37, #b8860b);
            background-size: 300% auto;
            color: #3d0000;
            font-size: 10px;
            font-weight: 800;
            padding: 2px 10px;
            border-radius: 20px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 5px;
            animation: cad-shine 2s linear infinite, cad-badge 1.5s ease-in-out infinite;
        }
        .cad-title {
            font-size: 14px;
            font-weight: 700;
            color: #f5d76e;
            margin: 0;
            line-height: 1.3;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cad-stars {
            font-size: 11px;
            color: #d4af37;
            letter-spacing: 1px;
            margin-top: 3px;
        }
        .cad-body {
            padding: 13px 14px;
            background: linear-gradient(180deg, #1a0a0a 0%, #200c0c 100%);
        }
        .cad-desc {
            font-size: 12.5px;
            color: #c9a0a0;
            line-height: 1.55;
            margin: 0 0 10px;
        }
        .cad-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 10px;
        }
        .cad-tag {
            font-size: 10px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 20px;
        }
        .cad-t-gold  { background: rgba(212,175,55,0.15); color: #f5d76e; border: 1px solid #d4af37; }
        .cad-t-red   { background: rgba(160,0,0,0.3);     color: #ff8a80; border: 1px solid #a00000; }
        .cad-t-light { background: rgba(255,255,255,0.07); color: #ccc;   border: 1px solid rgba(255,255,255,0.15); }
        .cad-prog-label {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #a07070;
            margin-bottom: 5px;
        }
        .cad-prog-bar {
            height: 5px;
            background: rgba(255,255,255,0.08);
            border-radius: 99px;
            overflow: hidden;
            margin-bottom: 11px;
        }
        .cad-prog-fill {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #a00000, #d4af37, #f5d76e);
            width: 0%;
            animation: cad-progress 1.4s 0.4s ease forwards;
        }
        .cad-footer {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .cad-cd {
            font-size: 12px;
            font-weight: 700;
            color: #f5d76e;
            background: rgba(212,175,55,0.1);
            border: 1px solid #d4af37;
            border-radius: 6px;
            padding: 5px 9px;
            animation: cad-pulse 1s ease-in-out infinite;
            white-space: nowrap;
            flex-shrink: 0;
            font-variant-numeric: tabular-nums;
        }
        .cad-btn {
            flex: 1;
            display: block;
            text-align: center;
            background: linear-gradient(90deg, #7a0000 0%, #a00000 30%, #d4af37 60%, #f5d76e 75%, #d4af37 85%, #a00000 100%);
            background-size: 300% auto;
            color: #fff;
            text-decoration: none;
            padding: 9px 10px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 13px;
            animation: cad-shine 2s linear infinite;
            border: 1px solid #d4af37;
            letter-spacing: 0.3px;
        }
        .cad-social {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            color: #7a5050;
            margin-top: 9px;
        }
        .cad-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #d4af37;
            display: inline-block;
            animation: cad-pulse 1.4s ease-in-out infinite;
        }
    </style>

    <div class="cad-wrap">
        <div class="cad-top">
            ' . $icon . '
            <div class="cad-top-info">
                <div class="cad-badge">🔥 Nổi bật</div>
                <p class="cad-title">' . esc_html($title) . '</p>
                <div class="cad-stars">★★★★★ <span style="color:rgba(212,175,55,0.6);font-size:10px;">12,400+ học viên</span></div>
            </div>
        </div>

        <div class="cad-body">
            <p class="cad-desc">' . esc_html($desc) . '</p>

            <div class="cad-tags">
                <span class="cad-tag cad-t-gold">Có chứng chỉ</span>
                <span class="cad-tag cad-t-red">Giảm 40%</span>
                <span class="cad-tag cad-t-light">Online linh hoạt</span>
            </div>

            <div class="cad-prog-label">
                <span>Suất ưu đãi đã đăng ký</span>
                <span style="color:#d4af37;font-weight:700;">72%</span>
            </div>
            <div class="cad-prog-bar">
                <div class="cad-prog-fill"></div>
            </div>

            <div class="cad-footer">
                <span class="cad-cd" id="cad-countdown">--:--:--</span>
                <a class="cad-btn" href="' . esc_url($link) . '" target="_blank"> Đăng ký ngay</a>
            </div>

            <div class="cad-social" style="justify-content: space-between;">
                <div>
                    <span class="cad-dot"></span>
                    <span>847 người đang xem</span>
                </div>
                <span style="font-style: italic; opacity: 0.7;">By Vo Van Loi</span>
            </div>
        </div>
    </div>

    <script>
        (function() {
            function cadTick() {
                var now = new Date(), end = new Date(now);
                end.setHours(23, 59, 59, 0);
                var d = Math.max(0, end - now);
                var h = String(Math.floor(d / 3600000)).padStart(2, "0");
                var m = String(Math.floor((d % 3600000) / 60000)).padStart(2, "0");
                var s = String(Math.floor((d % 60000) / 1000)).padStart(2, "0");
                var el = document.getElementById("cad-countdown");
                if (el) el.textContent = h + ":" + m + ":" + s;
            }
            cadTick();
            setInterval(cadTick, 1000);
        })();
    </script>';

    return $html;
}
add_shortcode('quang_cao_khoa_hoc', 'get_course_ads_html_combined');