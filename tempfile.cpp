#include <iostream>
using namespace std;

class Hello{
public:
    Hello(int a, int b = 0, int c = 0){
        std::cout<< a <<std::endl;
        std::cout<< b <<std::endl;
        std::cout<< c <<std::endl;
    }
};


int main(){
    Hello Dung(3, 5);
}