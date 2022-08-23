
class Stack<T>{
    private readonly items:T[];
    private readonly capacity?:number;
    private pointer?:number;
    public length?:number;
    constructor(kapasitas?:number){
        this.items = Array(kapasitas??0).fill(null);
        this.capacity = kapasitas??0;
        this.pointer = this.length = 0;
    }
    // cek apakah antrian kosong
    protected isEmpty(): boolean {
        return this.length===0;
    }
    // cek apakah antrian penuh
    protected isFull(): boolean {
        return this.length===this.capacity;
    }
    // memasukkan item, jika antrian belum penuh
    public push(item?:T): void {
        if(this.isFull()) return console.log("Antrian penuh");
        this.items[this.pointer] = item;
        // pointer dan ukuran antrian bertambah
        this.pointer = this.length += 1;
    }
    // mengambil dan menghapus item, di mulai dari
    // item terakhir dalam urutan antrian
    public pop(): T|string {
        if(this.isEmpty()) return "Antrian kosong";
        const item:T = this.items[this.pointer-1];
        this.items[this.pointer-1] = null;
        // pointer dan ukuran antrian berkurang
        this.pointer = this.length -= 1;
        return item;
    }
    // mengambil tanpa menghapus item, sesuai dengan urutan (index)
    // yang di tentukan. jika index di abaikan akan mengembalikan
    // akan mengembalikan item urutan teakhir
    public peek(index?:number): T|string {
        if(this.isEmpty()) return "Antrian kosong";
        // handler: jika index di luar jangkauan antrian
        if(index&&(index>this.capacity-1)) return "Index out of range!";
        const item:T = this.items[index??this.pointer-1];
        // pointer dan ukuran antrian tetap
        return item;
    }
}

const fav = new Stack(5);
console.clear();

// mencoba mengambil item, pada antrian kosong
// console.log(fav.pop());
// console.log(fav.peek(0));

// memasukkan item ke dalam antrian
fav.push("C"); // index (0)
fav.push("PHP"); // index (1)
fav.push("PYTHON"); // index (2)
fav.push("ECHMAScript"); // index (3)
fav.push("TYPEScript"); // index (4)

// mencoba memasukkan item, ke dalam antrian penuh
// fav.push("unknown yet");

// mengambil dan menghapus item, pada antrian
// console.log(fav.pop());
// console.log(fav.pop());
// console.log(fav.pop());
// console.log(fav.pop());
// console.log(fav.pop());

// mencoba mengambiil item, setelah antrian kosong
// console.log(fav.pop());

// mengambil item, berdasarkan urutan tertentu
console.log(fav.peek(3));
console.log(fav.peek(2));
console.log(fav.peek(0));
console.log(fav.peek(4));
console.log(fav.peek(1));

// mencoba mengambil item, diluar jangkauan antrian
console.log(fav.peek(11));

