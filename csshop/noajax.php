<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลเอกชนใน กทม. (ไม่ใช้ AJAX)</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>โรงพยาบาลเอกชนใน กทม. (ไม่ใช้ AJAX)</h1>

    <!-- ตารางแสดงข้อมูลโรงพยาบาล -->
    <table>
        <thead>
            <tr>
                <th>ชื่อโรงพยาบาล</th>
                <th>จำนวนเตียง</th>
                <th>ขนาดใหญ่</th>
                <th>ขนาดกลาง</th>
                <th>ขนาดเล็ก</th>
            </tr>
        </thead>
        <tbody id="hospitalTable">
            <!-- ข้อมูลโรงพยาบาลจะถูกเพิ่มในตารางนี้ -->
        </tbody>
    </table>

    <script>
        // ฟังก์ชันสำหรับจำแนกโรงพยาบาลและแสดงในตาราง
        function displayHospitalData(data) {
            let tableBody = document.getElementById("hospitalTable");

            data.features.forEach(hospital => {
                let name = hospital.properties.name;
                let numBed = hospital.properties.num_bed;

                // สร้างแถวใหม่ในตาราง
                let row = document.createElement('tr');

                // สร้างคอลัมน์สำหรับชื่อโรงพยาบาลและจำนวนเตียง
                let nameCell = document.createElement('td');
                nameCell.textContent = name;
                row.appendChild(nameCell);

                let numBedCell = document.createElement('td');
                numBedCell.textContent = numBed;
                row.appendChild(numBedCell);

                // สร้างคอลัมน์สำหรับขนาดของโรงพยาบาล (✔ ถ้าเป็นตามประเภทนั้น)
                let largeCell = document.createElement('td');
                let mediumCell = document.createElement('td');
                let smallCell = document.createElement('td');

                if (numBed > 90) {
                    largeCell.textContent = "✔";
                } else if (numBed >= 31) {
                    mediumCell.textContent = "✔";
                } else {
                    smallCell.textContent = "✔";
                }

                row.appendChild(largeCell);
                row.appendChild(mediumCell);
                row.appendChild(smallCell);

                // เพิ่มแถวลงในตาราง
                tableBody.appendChild(row);
            });
        }

        // อ่านไฟล์ JSON และแสดงข้อมูลเมื่อหน้าเว็บโหลดเสร็จ
        document.addEventListener('DOMContentLoaded', () => {
            fetch('priv_hos.json')
                .then(response => response.json())
                .then(data => displayHospitalData(data))
                .catch(error => console.error('Error loading JSON:', error));
        });
    </script>
</body>
</html>