//define a class time with data members hour, min and second.WAP to add two times
// a) use constructor for initialization.
// b) use dynamic memory alocation for object of time
// c) use dynamic constructor

#include <iostream>
using namespace std

class Time {
    int hour,min,sec;
    Time *ptr;

    public:
    Time(){
        ptr = new Time;
        ptr ->hour =0;
        ptr->min=0;
        ptr->sec=0;
    }

    void input(){
        cout<<"\n \n Enter the value of hour, min and second -";
        cin>>hour>>min>>sec;

    }

    void display(){
        cout<<"\n \n The result is = "<<"Hour = "<<hour<<" Min = "<<min<<" Second = "<<sec;

    }

    void sum(Time *ptr , Time *sptr){
        Time *fptr;

        fptr->min= ptr->min + sptr->min;
        fptr->hour= ptr->hour + sptr->hour;
        fptr->sec = ptr->sec + sptr->sec;

        fptr->display();
    }
};

int main(){

    Time *ptr=NULL , *nptr=NULL,*sptr=NULL;

    ptr = new Time;
    nptr = new Time;
    sptr = new Time;

    ptr ->input();
    ptr ->display();

    nptr->input();
    nptr ->display();

    sptr->sum(ptr , sptr);

    delete sptr;
    delete ptr;
    delete nptr;
    
    return 0;
}