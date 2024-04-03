<?php include('datathansohoc.php');
function tinhSoChuDao($ngaySinh) {
    // Tách ngày, tháng, năm sinh ra thành các con số
    $array = explode("/", $ngaySinh);
    $sum = 0;
    foreach ($array as $string) {
        $numbers = str_split($string); // Tách chuỗi thành các ký tự
        foreach ($numbers as $number) {
            $sum += (int)$number; // Cộng các số lại với nhau
        }
    }
    
    // Kiểm tra giá trị của $sum và tính toán lại nếu không nằm trong khoảng (2, 11)
    while ($sum < 2 || $sum > 11) {
        $newSum = 0;
        $digits = str_split(strval($sum)); // Tách số thành các chữ số
        foreach ($digits as $digit) {
            $newSum += (int)$digit; // Cộng các chữ số lại với nhau
        }
        $sum = $newSum;
    }
  	return $sum;
  }

// 
$ngaySinh1 = date('d/m/Y', strtotime($ngaySinh1));
$soChuDao1 = tinhSoChuDao($ngaySinh1);

//echo "Số chủ đạo của ngày sinh $ngaySinh1 là: $soChuDao1\n <br>";

//echo "luận giải số chủ đạo $datasochudao[$soChuDao1]. \n <br>";
//echo "luận giải số chủ đạo $datasochudao2[$soChuDao1]. \n <br>";
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';

//y nghia ngay sinh----------------------------------------------------------------------------------------

function findDayIndex($dateOfBirth) {
  $parts = explode('/', $dateOfBirth);
  $day = (int) $parts[0];
  if ($day > 31) return null; // invalid date
  
  if ($day == 11 || $day == 29) {
    return $day . '/2';
  } else if ($day == 22) {
    return '22/4';
  } else {
    $dayIndex = $day;
    if ($day >= 10) {
      $dayIndex = array_sum(str_split($day));
    }
    return $dayIndex;
  }
}

// Example usage
$dayIndex = findDayIndex($ngaySinh1);
if ($dayIndex != null) {
  //echo 'Chỉ số ngày sinh của người này là: ' . $dayIndex.'<br>';
    //echo 'luận giải Chỉ số ngày sinh của người này là: ' . $datasynghiangaysinh[$dayIndex];
} else {
  //echo 'Ngày sinh không hợp lệ!';
}
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';

//nam ca nhan----------------------------------------------------------------------------------------

function tinhNamCaNhan($ngaySinh) {
  $namHienTai = date('Y');
  $ngayThang = explode('/', $ngaySinh);
  $ngay = intval($ngayThang[0]);
  $thang = intval($ngayThang[1]);

  $soCaNhan = $namHienTai + $ngay + $thang;
  while ($soCaNhan > 9) {
    $soCaNhan = array_sum(str_split($soCaNhan));
  }

  return $soCaNhan;
}
$namcanhan1= tinhNamCaNhan($ngaySinh1);
//echo '<br> năm cá nhân:'.$namcanhan1.'<br>';
//echo 'ý nghĩa năm cá nhân:'.$datasnamcanhan[$namcanhan1].'<br>';
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';
//......................................................................
// tháng cá nhan
// Chỉ số năm cá nhân
//echo 'CHỈ SỐ THÁNG CÁ NHÂN:';
$personalYearNumber = $namcanhan1; // Thay đổi giá trị này để thử nghiệm

// Các chỉ số của từng tháng
$monthNumbers = array(
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
    12 => 0
);

// Lấy ngày tháng năm hiện tại
$currentDate = date("d/m/Y");

// Chuyển đổi ngày tháng năm thành mảng dữ liệu
$dateArray = explode("/", $currentDate);

// Tính toán chỉ số tháng cá nhân cho mỗi tháng trong năm
for ($i = 1; $i <= 12; $i++) {
    $monthNumbers[$i] = $i + $personalYearNumber;
    while ($monthNumbers[$i] > 9) {
        $monthNumbers[$i] = array_sum(str_split($monthNumbers[$i]));
    }
}

// Hiển thị kết quả
foreach ($monthNumbers as $month => $number) {
    $description = '';
    switch ($month) {
        case 1:
            $description = $datachisothangcanhan[$number];
            break;
        case 2:
            $description = $datachisothangcanhan[$number];
            break;
        case 3:
            $description = $datachisothangcanhan[$number];
            break;
        case 4:
            $description = $datachisothangcanhan[$number];
            break;
        case 5:
            $description = $datachisothangcanhan[$number];
            break;
        case 6:
            $description = $datachisothangcanhan[$number];
            break;
        case 7:
            $description = $datachisothangcanhan[$number];
            break;
        case 8:
            $description = $datachisothangcanhan[$number];
            break;
        case 9:
            $description = $datachisothangcanhan[$number];
            break;
        case 10:
            $description = $datachisothangcanhan[$number];
            break;
        case 11:
            $description = $datachisothangcanhan[$number];
            break;
        case 12:
            $description = $datachisothangcanhan[$number];
            break;
    }
    $chisotungthang= "<strong class='strong-main-color'>Chỉ số tháng cá nhân của tháng $month là: $number.<br> $description </strong><br>";

}
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';

//-------------------------------------------------------------------------------------------------
//chỉ số thái độ---------------------------------------------------------------------


// Tách ngày, tháng, năm sinh từ chuỗi birthday
list($day, $month, $year) = explode("/", $ngaySinh1);
// Tính tổng của ngày và tháng sinh
$attitudeNumber = $day + $month;
// Nếu tổng này lớn hơn 9, tiến hành cộng tiếp số hàng chục và số hàng đơn vị
if ($attitudeNumber > 9) {
    $attitudeNumber = floor($attitudeNumber / 10) + $attitudeNumber % 10;
}
//echo "Chỉ số thái độ của bạn là: " . $attitudeNumber;
//echo '<br> luận giải chỉ số thái độ:'.$dataschisothaido[$attitudeNumber].'<br>';
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';




//--------------------------------------------------------------------------------------
//chỉ số sứ mệnh-----------------------------------------------------------------------------------------------
$alphabet = array( //set giá trị
    'A' => 1,
    'B' => 2,
    'C' => 3,
    'D' => 4,
    'E' => 5,
    'F' => 6,
    'G' => 7,
    'H' => 8,
    'I' => 9,
    'J' => 1,
    'K' => 2,
    'L' => 3,
    'M' => 4,
    'N' => 5,
    'O' => 6,
    'P' => 7,
    'Q' => 8,
    'R' => 9,
    'S' => 1,
    'T' => 2,
    'U' => 3,
    'V' => 4,
    'W' => 5,
    'X' => 6,
    'Y' => 7,
    'Z' => 8,
);

// Hàm tính chỉ số sứ mệnh
function calculateDestinyNumber($name) {
    global $alphabet;
    $destinyNumber = 0;
    // Chuyển tên thành chuỗi chữ hoa và chuyển thành mảng các ký tự
    $nameChars = str_split(strtoupper($name));
    foreach ($nameChars as $char) {
        // Nếu ký tự là một chữ cái trong bảng chữ cái thì cộng giá trị số tương ứng vào tổng
        if (array_key_exists($char, $alphabet)) {
            $destinyNumber += $alphabet[$char];
        }
    }

    while ($destinyNumber > 9) {
        $destinyNumber = array_sum(str_split($destinyNumber));
        if ($destinyNumber == 11 || $destinyNumber == 22) {
            return $destinyNumber;
        }
    }
    return $destinyNumber;
}
//.............................................................................................
function removeAccent($str) { //hàm chuyển dấu
    $str = str_replace(
        array('à', 'á', 'ạ', 'ả', 'ã', 'â', 'ầ', 'ấ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ằ', 'ắ', 'ặ', 'ẳ', 'ẵ'),
        array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
        $str
    );
    $str = str_replace(
        array('è', 'é', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ề', 'ế', 'ệ', 'ể', 'ễ'),
        array('e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e'),
        $str
    );
    $str = str_replace(
        array('ì', 'í', 'ị', 'ỉ', 'ĩ'),
        array('i', 'i', 'i', 'i', 'i'),
        $str
    );
    $str = str_replace(
        array('ò', 'ó', 'ọ', 'ỏ', 'õ', 'ô', 'ồ', 'ố', 'ộ', 'ổ', 'ỗ', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ'),
        array('o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o'),
        $str
    );
    $str = str_replace(
        array('ù', 'ú', 'ụ', 'ủ', 'ũ', 'ư', 'ừ', 'ứ', 'ự', 'ử', 'ữ'),
        array('u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u'),
        $str
    );
    $str = str_replace(
        array('ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ'),
        array('y', 'y', 'y', 'y', 'y'),
        $str
    );
    $str = str_replace(
        array('đ'),
        array('d'),
        $str
    );
    return $str;
}
//
function xoadautiengviet($name) {
//đoạn code chuyển tiếng việt lộn xộn ra không dấu viết hoa
$name= strtolower($name); // lower name
$name = mb_strtolower($name, 'UTF-8'); // Ư Ớ Ờ => ư ơ ờ à
$name = removeAccent($name); // ư ơ ờ à => u o o a
$name =strtoupper($name);// u o o => U O O A
return $name;
};
 // tính sứ mệnh
$destinyNumber = calculateDestinyNumber(xoadautiengviet($hovaten)); // tính sứ mệnh
//echo "Chỉ số sứ mệnh của bạn là: " . $destinyNumber.'<br>';
//echo  $dataschisosumenh[$destinyNumber];

//echo '<br> --------------------------------------------------------------------------------------------------- <br>';

//chỉ số linh hồn........................................................................................................ 1 to 9 vs 11 vs 22
$xoanguyenam = preg_replace('/[^UEOAI]/', '', xoadautiengviet($hovaten)); // U O O A =>UOO (remove UEOAI xoá nguyên âm tinh chi so linh hon)
$chisolinhhon=calculateDestinyNumber($xoanguyenam);
//echo "Chỉ số linh hồn của bạn là: " . $chisolinhhon.'<br>';
//echo '<br> luận giải Chỉ số linh hồn:'.$dataschisolinhhon[$chisolinhhon].'<br>';
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';

//chỉ số biểu đạt........................................................................................................ 1 to 11 vs 22/4
function calculateconsobieudat($name) {
    global $alphabet;
    $destinyNumber = 0;
    // Chuyển tên thành chuỗi chữ hoa và chuyển thành mảng các ký tự
    $nameChars = str_split(strtoupper($name));
    foreach ($nameChars as $char) {
        // Nếu ký tự là một chữ cái trong bảng chữ cái thì cộng giá trị số tương ứng vào tổng
        if (array_key_exists($char, $alphabet)) {
            $destinyNumber += $alphabet[$char];
        }
    }

    while ($destinyNumber > 11) {
        $destinyNumber = array_sum(str_split($destinyNumber));
        if ($destinyNumber == 11 || $destinyNumber == 22) {
            return $destinyNumber;
        }
    }
    return $destinyNumber;
}
$nametest = $hovaten;
$nametest = preg_replace('/[aeiouyAEIOUY]/', '', xoadautiengviet($nametest));
$chisobieudat = calculateconsobieudat($nametest);
//echo $lastName;
//echo "<br> Chỉ số biểu đạt của bạn là: " . $chisobieudat.'<br>';
//echo '<br> luận giải Chỉ số biểu đạt:'.$dataschisobieudat[$chisobieudat].'<br>';

//echo '<br> --------------------------------------------------------------------------------------------------- <br>';

//name......................................................................................................
$namez =xoadautiengviet($hovaten);
// Tách từng ký tự trong tên thành một mảng
$name_arr = str_split($namez);
// Tạo một mảng chứa ký tự và giá trị tương ứng
$name_values = array();// array chứa name và số
$name_numbers = array();// array chứa number
foreach ($name_arr as $char) {
    if (isset($alphabet[$char])) {
        $name_values[] = array($char, $alphabet[$char]);
    }
}
//
// In ra kết quả

foreach ($name_values as $value) {
    $html= '<tr></tr><td class="cname">'.$value[0].'</td></tr>' . "\t";
   // echo $html;
}
#

//echo "\n <br>";
foreach ($name_values as $value) {
  	$name_numbers[]= $value[1];
    //echo  '<td class="cnumber">'.$value[1].'</td>'. "\t";
}
//echo '<br> --------------------------------------------------------------------------------------------------- <br>';
//biểu đồ tên----------------------------------------------------------------
// Tạo mảng lưu trữ số lặp
$dup_arr = array();
// Đếm số lần lặp của từng số và lưu vào mảng
foreach ($name_values as $value) {
    if (isset($dup_arr[$value[1]])) {
        $dup_arr[$value[1]]++;
    } else {
        $dup_arr[$value[1]] = 1;
    }
}

// In ra các số lặp và số lần lặp
foreach ($dup_arr as $num => $count) {
    //echo "Bạn có $count số $num: " . str_repeat($num, $count) . "<br>";
}

//----------------------------------------------------------------#
//số từ tên và luận giải ý nghĩa
// Mảng ban đầu chứa các số lặp lại
$repeated_numbers = $name_numbers;

// Mảng mới chứa các số lặp lại từ 1 đến 10
$repeated_array = array();
for ($i = 1; $i <= 9; $i++) {
    $count = array_count_values($repeated_numbers);
    if (isset($count[$i])) {
        $repeated_array[$i] = str_repeat($i, $count[$i]);
    } else {
        $repeated_array[$i] = '';
    }
}
// In ra mảng mới
// print_r($repeated_array);
// echo '<br>-------------------------------------------------------------------------------------------------------------<br>';
function hamrutgonngaysinhkhonglaplai($ngaySinh) {
    // Tách ngày, tháng, năm sinh ra thành các con số
    $array = explode("/", $ngaySinh);
    
    // Tạo mảng mới với các phần tử ban đầu là ''
    $new_array = array_fill(1, 9, '');
    
    foreach ($array as $value) {
      $digits = str_split($value);
      foreach ($digits as $digit) {
        $new_array[$digit] = $digit;
      }
    }
    return $new_array;
}
// 
$arrayngaysinh = hamrutgonngaysinhkhonglaplai($ngaySinh1);

function createblock($inputArray) {
    $blockArray = array();
    $blockArray[1] = '';
    $blockArray[2] = '';
    $blockArray[3] = '';
    $blockArray[4] = '';
    $blockArray[5] = '';
    $blockArray[6] = '';
    $blockArray[7] = '';
    $blockArray[8] = '';

    if (in_array('1', $inputArray) && in_array('2', $inputArray) && in_array('3', $inputArray)) {
        $blockArray[1] = 'style="display:block;"';
    }
    if (in_array('4', $inputArray) && in_array('5', $inputArray) && in_array('6', $inputArray)) {
        $blockArray[2] = 'style="display:block;"';
    }
    if (in_array('7', $inputArray) && in_array('8', $inputArray) && in_array('9', $inputArray)) {
        $blockArray[3] = 'style="display:block;"';
    }
    if (in_array('3', $inputArray) && in_array('6', $inputArray) && in_array('9', $inputArray)) {
        $blockArray[4] = 'style="display:block;"';
    }
    if (in_array('2', $inputArray) && in_array('5', $inputArray) && in_array('8', $inputArray)) {
        $blockArray[5] = 'style="display:block;"';
    }
    if (in_array('1', $inputArray) && in_array('4', $inputArray) && in_array('7', $inputArray)) {
        $blockArray[6] = 'style="display:block;"';
    }
    if (in_array('3', $inputArray) && in_array('5', $inputArray) && in_array('7', $inputArray)) {
        $blockArray[7] = 'style="display:block;"';
    }
    if (in_array('1', $inputArray) && in_array('5', $inputArray) && in_array('9', $inputArray)) {
        $blockArray[8] = 'style="display:block;"';
    }

    return $blockArray;
}
$blockArray=createblock($arrayngaysinh);

function createnoblock($inputArray) {
  // tạo mảng mới với các giá trị mặc định là rỗng
  $newArray = array_fill(0, 8, '');
  
  // tìm các bộ số không xuất hiện trong mảng đầu vào
  $blocks = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9),
    array(3, 6, 9),
    array(2, 5, 8),
    array(1, 4, 7),
    array(3, 5, 7),
    array(1, 5, 9)
  );
  
  foreach ($blocks as $key => $block) {
    // kiểm tra xem các giá trị trong mảng đầu vào có xuất hiện trong bộ số không
    if (!array_intersect($block, $inputArray)) {
      // nếu không, đánh dấu mảng mới tại vị trí tương ứng là 'noblock'
      $newArray[$key] = 'style="display:noblock;"';
    }
  }
  
  return $newArray;
}
$noblockArray=createnoblock($arrayngaysinh);
function hamgoparray($arr1, $arr2) {
    $len = count($arr1);
    $result = array();

    // Duyệt qua từng phần tử của hai mảng và thực hiện phép gộp từng cặp phần tử
    for ($i = 1; $i <= $len; $i++) {
        $result[$i] = $arr1[$i] . $arr2[$i];
    }

    return $result;
}
$arrayNOvsBLOCK =hamgoparray($blockArray,$noblockArray);
//echo '<br> ----------------------------------------------------------------------------------------------------------------------------------------------------------- <br>';
// bieu do ngay sinh
function hamrutgonngaysinhlaplai($date) {
    $arr = array_fill(1, 9, ''); // Tạo một mảng gồm 9 phần tử, giá trị ban đầu là rỗng

    // Tách các số từ ngày sinh và đưa vào mảng
    foreach (str_split(str_replace('/', '', $date)) as $num) {
        $arr[$num] .= $num;
    }

    return $arr;
}
$arrayngaysinhlaplai = hamrutgonngaysinhlaplai($ngaySinh1);
$bieudotenvangaysinh =hamgoparray($arrayngaysinhlaplai,$repeated_array);
// rut gon so trung lăp 333 => 3
function rutgonso($array1)
{
$array2 = array_map(function($element) {
    if (preg_match('/^(\d)(\d*)$/', $element, $matches)) {
        return $matches[1];
    }
    return $element;
}, $array1);
return $array2;
}
$repeated_array;//name;
$bieudotenvangaysinh;//name+birh;
$arraynamenorepeart= rutgonso($repeated_array);
$arraybieudotonghopnorepeat= rutgonso($bieudotenvangaysinh);
$arrayNOvsBLOCKname =hamgoparray(createblock($arraynamenorepeart),createnoblock($arraynamenorepeart));
$arrayNOvsBLOCKtonghop =hamgoparray(createblock($arraybieudotonghopnorepeat),createnoblock($arraybieudotonghopnorepeat));
//ban co mui ten gi
function findDatamuitensohuu($arr1, $arr2) {
    $result = array();
    foreach($arr1 as $key => $value) {
        if($value == 'style="display:block;"') {
            if(isset($arr2[$key])) {
                $result[$key] = $arr2[$key];
            }
        }
    }
    return $result;
}
$muitenbanco = findDatamuitensohuu($arrayNOvsBLOCKtonghop, $datamuitensohuu);
function findDatamuitentrong($arr1, $arr2) {
    $result = array();
    foreach($arr1 as $key => $value) {
        if($value == 'style="display:noblock;"') {
            if(isset($arr2[$key])) {
                $result[$key] = $arr2[$key];
            }
        }
    }
    return $result;
}
$muitenbankhongco = findDatamuitentrong($arrayNOvsBLOCKtonghop, $datamuitentrong);
//----------------------------------------------------------------------------------------------------------------------
// foreach ($muitenbanco as $value) {
//     echo $value . "<br>";
//   } // in ra các mũi tên có sở hữu
//   //print_r($bieudotenvangaysinh);

function process1_array($arr) { // hàm chuyển từ 6 số thành 5 số vd 66666 => 66666
    foreach ($arr as $key => $value) {
        if (is_numeric($value) && strlen($value) > 4) {
            $arr[$key] = substr($value, 0, 5);
        }
    }
    return $arr;
}
echo '<br>';
$arraytonghoprutgon=array_filter(process1_array($bieudotenvangaysinh));//arry_filter để lọc ra những phần tử rỗng
//foreach ($arraytonghoprutgon as $value)
   // {
   //     echo 'Bạn Có Con Số <strong>'.$value. '</strong><br>'.$arraytonghoprutgon[$value];
   // }

//Hàm tìm con số cô độc
//    if ($arraybieudotonghopnorepeat[3] == 3 && $arraybieudotonghopnorepeat[2] == '' && $arraybieudotonghopnorepeat[5] == '' && $arraybieudotonghopnorepeat[6] == '') {
//     echo '<Bạn có số 3 cô độc><br>'.$datasbieudotonghop['số 3 cô độc'].'<br>';
//  } if ($arraybieudotonghopnorepeat[7] == 7 && $arraybieudotonghopnorepeat[4] == '' && $arraybieudotonghopnorepeat[5] == '' && $arraybieudotonghopnorepeat[8] == '') {
//     echo '<Bạn có số 7 cô độc><br>'.$datasbieudotonghop['số 7 cô độc'].'<br>';
//  } if ($arraybieudotonghopnorepeat[1] == 1 && $arraybieudotonghopnorepeat[2] == '' && $arraybieudotonghopnorepeat[5] == '' && $arraybieudotonghopnorepeat[4] == '') {
//     echo '<Bạn có số 1 cô độc><br>'.$datasbieudotonghop['số 1 cô độc'].'<br>';
//  } if ($arraybieudotonghopnorepeat[9] == 9 && $arraybieudotonghopnorepeat[6] == '' && $arraybieudotonghopnorepeat[5] == '' && $arraybieudotonghopnorepeat[8] == '') {
//     echo '<Bạn có số 9 cô độc><br>'.$datasbieudotonghop['số 9 cô độc'].'<br>';
//  }
 
    
?>
