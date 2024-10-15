<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สิทธิพิเศษลูกค้า Blueshop</title>
    <script>
        function checkDiscount() {
            const isMember = document.getElementById('membership').checked;
            const totalAmount = parseFloat(document.getElementById('total-amount').value);

            let eligibleItemSection = document.getElementById('eligible-item-section');
            eligibleItemSection.innerHTML = ''; // Clear previous results

            if (isMember) {
                document.getElementById('member-discount').style.display = 'block';
                document.getElementById('non-member-discount').style.display = 'none';
            } else {
                document.getElementById('non-member-discount').style.display = 'block';
                document.getElementById('member-discount').style.display = 'none';
                if (totalAmount >= 500) {
                    eligibleItemSection.innerHTML = 'คุณมีสิทธิ์รับสินค้าเพิ่มในราคาไม่เกิน 500 บาท';
                }
            }
        }
    </script>
</head>
<body>
    <h1>สิทธิพิเศษลูกค้า Blueshop</h1>
    
    <form>
        <label>เป็นสมาชิก: <input type="checkbox" id="membership" onchange="checkDiscount()"></label><br>
        <label>ยอดสั่งซื้อทั้งหมด: <input type="number" id="total-amount" step="0.01" onchange="checkDiscount()"></label><br><br>

        <div id="member-discount" style="display:none;">
            สมาชิก: ซื้อสินค้า 1 ชิ้นมีสิทธิ์เลือกอีก 1 ชิ้นฟรีในราคาเท่ากันหรือน้อยกว่า
        </div>
        <div id="non-member-discount" style="display:none;">
            ลูกค้าที่ไม่เป็นสมาชิก: ยอดซื้อเกิน 500 บาทมีสิทธิ์รับสินค้าเพิ่มในราคาไม่เกิน 500 บาท
        </div>

        <div id="eligible-item-section"></div>
    </form>
</body>
</html>