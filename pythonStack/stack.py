from os import system

class Stack:
    __items:list = []
    def __init__(self, kapasitas:int) -> None:
        self.__items = [None]*kapasitas
        self.capacity = kapasitas
        self.pointer = self.length = 0
    # cek apakah antrian kosong
    def isEmpty(self) -> bool:
        return self.length==0
    # cek apakah antrian penuh
    def isFull(self) -> bool:
        return self.length==self.capacity
    # memasukkan item, jika antrian belum penuh
    def push(self, item:int or str) -> None:
        if self.isFull(): return print("Antrian penuh!")
        self.__items[self.pointer] = item
        # pointer dan ukuran antrian bertambah
        self.pointer += 1
        self.length += 1
    # mengambil dan menghapus item, di mulai dari item terakhir
    # dalam antrian sesuai konsep LIFO
    def pop(self) -> int or str:
        if self.isEmpty(): return "Antrian kosong!"
        item:int or str = self.__items[self.pointer-1]
        self.__items[self.pointer-1] = None
        # pointer dan ukuran antrian berkurang
        self.pointer -= 1
        self.length -= 1
        return item
    # mengambil item sesuai dengan urutan(index) yang di tentukan, tanpa menghapus item
    # jika index di abaikan, mengembalikan item urutan terakhir
    def peek(self, index:int) -> int or str:
        if self.isEmpty(): return "Antrian kosong!"
        item:int or str = self.__items[index] if index is not None else self.__items[self.pointer-1]
        return item

# asumsikan sebuah antrian buku, di wakili judulnya sebanyak (5) buah
buku:Stack = Stack(5)
system("cls")

# memasukkan buku kedalam antrian
buku.push("a") #1
buku.push("b") #2
buku.push("c") #3
buku.push("d") #4
buku.push("e") #5

# mencoba memasukkan buku kedalam antrian penuh
#buku.push("f") #6

# mengambil dan mnampilkan item, berdasarkan index yang di tentukan
# acak
# print(buku.peek(0))
# print(buku.peek(3))
# print(buku.peek(1))
# print(buku.peek(2))
# print(buku.peek(4))

# mengambil dan menghapus, item berdasarkan konsep LIFO
# print(buku.pop()) #1
# print(buku.pop()) #2
# print(buku.pop()) #3
# print(buku.pop()) #4
# print(buku.pop()) #5

# mencoba mengambil item, setelah antrian kosong
# print(buku.pop()) #6

# opsi, menghapus object buku
del buku

