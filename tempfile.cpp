#include <iostream>

class Hello{
    Hello(int n){
        std::cout<< "Start" << std::endl;
    }
    ~Hello(){
        std::cout<< "End" << std::endl;
    }
};

Hello Dung = Hello(12);

int main(){
    std::cout<< "Hellword" << std::endl;
}