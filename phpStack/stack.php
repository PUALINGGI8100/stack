<?php

    // ops, disabling warning
    error_reporting(~E_WARNING);

    // helpers function
    trait helperFu {
        // cek apakah antrian kosong
        private function isEmpty(): bool {
            return $this->length==0;
        }
        // cek apakah antrian penuh
        private function isFull(): bool {
            return $this->length==$this->capacity;
        }
    }

    final class Stack {
        use helperFu;
        private array $items;
        private ?int $pointer;
        public ?int $length;
        private ?int $capacity;
        public function __construct(?int $kapasitas){
            $this->items = array_fill(0, $kapasitas??0, null);
            $this->capacity = $kapasitas;
            $this->pointer = $this->length = 0;
        }
        // memasukkan item ke dalam antrian, jika antrian belum penuh
        public function push(int|string $item=null): void {
            if($this->isFull()){
                printf("Antrian Penuh!\n");
                return;
            }
            $this->items[$this->pointer] = $item;
            // pointer dan ukuran antrian bertambah
            $this->pointer = $this->length += 1;
        }
        // mengambil dan menghapus item, di mulai dari
        // item yang ada di urutan terakhir, sesuai konsep LIFO
        public function pop(): int|string {
            if($this->isEmpty()) return "Antrian kosong!";
            $item = $this->items[$this->pointer-1];
            $this->items[$this->pointer-1] = null;
            // pointer dan ukuran antrian berkurang
            $this->pointer = $this->length -= 1;
            return $item;
        }
        // mengambil tanpa menghapus item, sesuai dengan urutan (index)
        // yang di tentukan, jika (index) di abaikan akan mengembalikan
        // item yang ada pada urutan terakhir
        public function peek(?int $index): int|string {
            if($this->isEmpty()) return "Antrian kosong!";
            $item = $this->items[$index??$this->pointer-1]??"Index out of range!";
            // pointer dan ukuran antrian tidak berubah
            return $item;
        }
    }

    // asumsikan antrian angka, sebanyak (3)
    $objek = new Stack(3);

    // mencoba mengambil item dari antrian kosong
    // echo $objek->pop();

    // memasukkan item ke dalam antrian
    $objek->push(1); # index (0)
    $objek->push(2); # index (1)
    $objek->push(3); # index (2)

    // memasukkan item ke dalam antrian penuh
    // $objek->push(4); # index(4)

    // mengambil dan menghapus item, berdasarkan konsep LIFO
    // printf("%d\n", $objek->pop());
    // printf("%d\n", $objek->pop());
    // printf("%d\n", $objek->pop());
    
    // mencoba mengambil item setelah, antrian kosong
    // printf("%s\n", $objek->pop());

    // mengambil tanpa menghapus item, dalam antrian
    // sesuai index yang di tentukan
    // printf("%d\n", $objek->peek(1));
    // printf("%d\n", $objek->peek(2));
    // printf("%d\n", $objek->peek(0));

    // mencoba mengambil item, di luar jangkauan antrian
    // printf("%s\n", $objek->peek(10));
    
