#include<iostream>
#include<stdlib.h>
using namespace std;
/*
    Employess

    id

    name

    surname

    department
*/
class EMPLOYEE{
 int  ID;
 char NAME[20];
 char SURNAME[20];
 char DEPT[20];
 public:
 	int Insert(EMPLOYEE *p,int n)
	{
    cout<<"Enter ID: ";
	cin>>p[n].ID;
	cout<<"Enter NAME: ";
	cin>> p[n].NAME;
	cout<< "Enter SURNAME: ";
	cin>> p[n].SURNAME;
	cout<<"Enter DEPT: ";
	cin>> p[n].DEPT;
	cout<<"\nRECORD INSERTED...\n";
	n++;
	return n;
	}
	void Search(EMPLOYEE *p,int roll,int n)
	{
	int i=0;
	for( i=0;i<n;i++)
	{
	   if(p[i].ID==roll)
    		{
		cout<<"ROLL\tNAME\tSEC\tDEPT\n==============================================\n";
	    	cout<<ID<<"\t"<<NAME<<"\t"<<SURNAME<<"\t"<<DEPT<<"\n";
		break;
    		}
	}
	if(p[i].ID!=roll)
	{
	cout<<"\nRECORD NOT FOUND.\n";
	}

    }

	void Display(){
	cout<<ID<<"\t"<<NAME<<"\t"<<SURNAME<<"\t"<<DEPT<<"\n";
	}
	int Del(EMPLOYEE *p,int n,int roll)
	{
		int j=0,k,flag=0;
		for(j=0;j<n;j++)
		{
			if(p[j].ID==roll)
            {
                flag=1;
                break;
            }
		}
        if(flag==1)
        {
            for(k=j;k<n;k++)
            {
            p[k]=p[k+1];
            }
            cout<<"\nRECORD DELETED.\n";
            return n-1;
        }
			else
			{
				cout<<"\nRecord Not Found\n";
				return n;
			}
	}
	int Update(EMPLOYEE *p,int roll,int n)
	{
		int i,ch1;
		for(i=0;i<n;i++)
		{
		if(p[i].ID==roll)
    		{
    			while(1){
    			cout<<"\n!!===OPTIONS IN UPDATE===!!\n";
    			cout<<"\n 1. Update Section";
    			cout<<"\n 2. Update Deptarment";
   				cout<<"\n 3. Update Both";
   				cout<<"\n 4. Return to main Menu";
   				cout<<"\n\n Enter Your Choice:";
   				cin>>ch1;
				switch(ch1){
    				case 1: cout<<"Section:";
    						cin>>p[i].SURNAME;
    						cout<<"Record Updated...\n";
    						break;
   					case 2: cout<<"DEPT:\t";
   							cin>>p[i].DEPT;
   							cout<<"Record Updated...\n";
   							break;
					case 3: cout<<"Section:";
							cin>>p[i].SURNAME;
							cout<<"DEPT:\t";
							cin>>p[i].DEPT;
							cout<<"Record Updated...\n";
							break;
					case 4: return n;
					default: cout<<"!! Wrong Key !!";
							break;
					}
				}
			break;
    		}
		}
    		if(p[i].ID!=roll)
		{
    		cout<<"\nRecord Not Found\n\n";
		}
	}
};
int main()
{
 EMPLOYEE o[10];
 int i=0,ch,j,roll;
 while(1){
   cout<<"\n!!===// SHOP METRIC /// EMPLOYEE MANAGMENT SYSTEM===!!";
   cout<<"\n";
   cout<< "\n 1.INSERT";
   cout<< "\n 2.SEARCH";
   cout<< "\n 3.DISPLAY";
   cout<< "\n 4.DELETE";
   cout<< "\n 5.UPDATE";
   cout<< "\n 6.EXIT";
   cout<< "\n\n ENTER YOUR CHOICE:";
   cin>> ch;
   switch(ch){
     case 1: i=o[0].Insert(o,i);
               break;
     case 3: cout<<"ROLL\tNAME\tSEC\tDEPT\n==============================================\n";
		for(j=0;j<i;j++){
		o[j].Display();
		}
		break;
     case 2:
		cout<<"Enter the ID for Search:";
		cin>> roll;

		o[0].Search(o,roll,i);

		break;
	 case 4:
		cout<<"Enter the ID to Delete:";
		cin>> roll;
		i=o[0].Del(o,i,roll);
		break;
	 case 5:
	 	cout<<"Enter the ID For Data Update:";
		cin>> roll;
		i=o[0].Update(o,roll,i);
		break;
	 default: cout<<"Wrong Key!!";
	 		break;
     case 6: exit(0);
    }
  }

 }
