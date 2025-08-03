<div>
    <h1>Trang Test Livewire</h1>
    <h2>Giá trị perPage hiện tại: {{ $perPage }}</h2>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Gửi đi một số cố định để test
            let testValue = 5;

            console.log('TEST: Chuẩn bị gửi sự kiện với giá trị:', testValue);

            // Gửi sự kiện 'test-event'
            Livewire.dispatch('test-event', { perPage: testValue });

            console.log('TEST: Đã gửi sự kiện.');
        });
    </script>
</div>
