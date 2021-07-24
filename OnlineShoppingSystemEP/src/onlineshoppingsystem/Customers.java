/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package onlineshoppingsystem;

/**
 *
 * @author hk600
 */
public class Customers {

    String name;
    String surname;
    int age;
    private String phoneNumber;

    public Customers() {
        name = " ";
        surname = " ";
        age = 0;
        phoneNumber = " ";

    } // close Customers1 

    public Customers(String n, String s, int a, String p) {

        name = n;
        surname = s;
        age = a;
        phoneNumber = p;

    } // close Customers2

    public void Printall() {
        System.out.println("\nName: " + name);
        System.out.println("Surname: " +surname);
        System.out.println("Age: " + age);
        System.out.println("Phone number: " + phoneNumber);

    } // close Printall
     public void setPhoneNumber(String pN){
	phoneNumber=pN; 
} // end setPhoneNumber
    public String getPhoneNumber() {
        return phoneNumber ; 
    } // close getPhoneNumber
    public void printName() {
        System.out.print(name  + " " + surname );
       
    } // close printName
    
    
} // end class 

