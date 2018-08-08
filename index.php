<?php
/*
 * АЛГОРИТМ БИНАРНОГО ПОИСКА
 * Algorithm of binary search
 * Время алгоритма O(log n)
*/
function binary_search(array $list, $item)
{
    $low = 0;
    $high = count($list) - 1;
    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);
        $guess = $list[$mid];
        if ($guess == $item) {
            return $mid;
        }
        if ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return null;
}

//print binary_search([1, 3, 5, 7, 9], 7);


/*
 * АЛГОРИТМ СОРТИРОВКИ ВЫБОРОМ
 * Algorithm of selection sort
 * Время алгоритма O(n2)
*/
function findSmallest(array $arr)
{
    $smallest = $arr[0];
    $smallest_index = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] < $smallest) {
            $smallest = $arr[$i];
            $smallest_index = $i;
        }
    }
    return $smallest_index;
}

function selectionSort(array $arr)
{
    $newArr = [];
    $lengthArr = count($arr);
    for ($i = 0; $i < $lengthArr; $i++) {
        $smallest = findSmallest($arr);
        $newArr[] = $arr[$smallest];
        unset($arr[$smallest]);
        $arr = array_values($arr);
    }
    return $newArr;
}

//print_r(selectionSort([5, 3, 6, 2, 10]));


/*
 * АЛГОРИТМЫ РЕКУРСИИ
 * ALGORITHMS OF RECURSION
*/

/*
 * Алгоритм вычисления факториала итеративно
 * Algorithm of calculating factorial iteratively
*/
function findFactorial($n)
{
    if (!is_int($n)) {
        return null;
    }
    $f = 1;
    while ($n >= 1) {
        $f = $n * $f;
        $n = $n - 1;
    }
    return $f;
}

//print findFactorial(6);

/*
 * Алгоритм вычисления факториала рекурсией
 * Algorithm of calculating factorial recursively
 */
function findFactorialRecursively($n)
{
    if (!is_int($n)) {
        return null;
    }
    if ($n === 1) {
        return 1;
    } else {
        return $n * findFactorialRecursively($n - 1);
    }
}

//print findFactorialRecursively(6);

/*
 * Алгоритм вычисления числа фибоначчи итеративно
 * Algorithm of calculating Fibonacci numbers iteratively
 * 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144 ...
 */
function findFibonacci($n)
{
    if (!is_int($n) || $n < 1) {
        return null;
    }
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    return $a;
}

//print findFibonacci(80);

/*
 * Алгоритм вычисления числа фибоначчи рекурсией
 * Algorithm of calculating Fibonacci numbers recursively
 */
function findFibonacciRecursively($n)
{
    if (!is_int($n) || $n < 1) {
        return null;
    }
    if ($n === 1) {
        return 1;
    } else {
        return findFibonacciRecursively($n - 1) + findFibonacciRecursively($n - 2);
    }
}

//print findFibonacciRecursively(8);

/*
 * Решение задачи методом "разделяй и властвуй" состоит из двух шагов:
 * 1. Сначала определяется базовый случай. Это должен быть простейший случай из всех возможных.
 * 2. Задача делится или сокращается до тех пор, пока не будет сведена к базовому случаю.
 *
 * To solve a problem using Divide & conquer, there are two steps:
 * 1. Figure out the base case. This should be the simplest possible case.
 * 2. Divide or decrease your problem until it becomes the base case.
*/

/*
 * Алгоритм Евклида
 * Evklid's algorithm
 */
function Evklid($a, $b)
{
    if ($a === $b) {
        return $a;
    } elseif ($a > $b) {
        $a = $a % $b === 0 ? $b : $a - $b * (int)($a / $b);
        return Evklid($a, $b);
    } else {
        $b = $b % $a === 0 ? $a : $b - $a * (int)($b / $a);
        return Evklid($a, $b);
    }
}

//print Evklid(1680, 640);

/*
 * Рекурсивная функция нахождения суммы массива
 * Recursive function of calculating array's sum
 */
function findArrSum(array $a)
{
    if ($a == []) {
        return 0;
    } else {
        return array_pop($a) + findArrSum($a);
    }
}

//print findArrSum([2,4,6,8]);

/*
 * Рекурсивная функция подсчета элементов в списке
 * Recursive function of counting elements in the list
 */
function findArrCount(array $a)
{
    if ($a == []) {
        return 0;
    } else {
        array_pop($a);
        return 1 + findArrCount($a);
    }
}

//print findArrCount([2,4,6,8,10]);

/*
 * Рекурсивная функция нахождения наибольшего числа в списке
 * Recursive function of finding the biggest number in the list
 */
function findArrGreater(array $a)
{
    if ($a == []) {
        return 0;
    } else {
        $b = array_pop($a);
        $max = findArrGreater($a);
        return $b > $max ? $b : $max;
    }
}

//print findArrGreater([2,4,12,8,10]);


/*
 * Алгоритм бинарного поиска рекурсией
 * Algorithm of binary search by recursion
*/
function binary_search_r(array $list, int $item, int $left, int $right)
{
    $mid = (int)(($left + $right) / 2);
    if ($list[$mid] === $item) {
        return $mid;
    } elseif ($list[$mid] > $item) {
        return binary_search_r($list, $item, $left, $mid - 1);
    } else {
        return binary_search_r($list, $item, $mid + 1, $right);
    }
}

//print binary_search_r([1, 3, 5, 7, 9], 7, 0, 4);

/*
 * Алгоритм быстрой сортировки
 * Algorithm of quicksort
 * O(n x log n)
 */
function quicksort(array $arr)
{
    $arrCount = count($arr);
    if ($arrCount < 2) {
        return $arr;
    } else {
        $pivotIndex = random_int(0, $arrCount - 1);
        $pivot = $arr[$pivotIndex];
        unset($arr[$pivotIndex]);
        $arr = array_values($arr);
        $less = [];
        $greater = [];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] <= $pivot) {
                $less[] = $arr[$i];
            } else {
                $greater[] = $arr[$i];
            }
        }
        return array_merge(quicksort($less), [$pivot], quicksort($greater));
    }
}

//print_r(quicksort([10, 5, 2, 3, 7, 20, 11, 4]));


/*
 * Алгоритм поиска в ширину
 * Algorithm of breadth-first search
 * O(V + E)
*/

function has_double_gg_in_name($name) {
    return (bool)preg_match('/gg/', $name);
}

$graph = [];
$graph['You'] = ['Alice', 'Bob', 'Claire'];
$graph['Bob'] = ['Anuj', 'Peggy'];
$graph['Alice'] = ['Peggy'];
$graph['Claire'] = ['Thom', 'Jonny'];
$graph['Anuj'] = [];
$graph['Peggy'] = [];
$graph['Thom'] = [];
$graph['Jonn'] = [];

function breadthSearch($graph, $name) {
    $search_queue = [];
    $search_queue = array_merge($search_queue, $graph[$name]);
    $searched = [];
    while (!empty($search_queue)) {
        $person = array_shift($search_queue);
        if(!in_array($person, $searched)) {
            if(has_double_gg_in_name($person)) {
                print $person . ' has double GG in name!';
                return true;
            } else {
                $search_queue = array_merge($search_queue, $graph[$person]);
                $searched[] = $person;
            }
        }
    }
    return false;
}

//breadthSearch($graph, 'You');