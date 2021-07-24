package onlineshoppingsystem;

/**
 *
 * @author hk600
 */
import javax.swing.JOptionPane;
import java.io.*;
import static java.lang.System.*;
import java.util.Vector;

public class OnlineShoppingSystem {
    
public static final int arraySize = 2;

    public static void main(String[] args) throws Exception {

        System.out.println("Welcome to our Online shopping, Padma");
        
        Customers[] Customer = new Customers[arraySize];
        int k = 0;
        try { while (k < 100) {
            int choice = Integer.parseInt(JOptionPane.showInputDialog(" Please enter a number\n"
                    + " 1) Input Customer details\n"
                    + " 2) Make an order\n"
                    + " 3) Update Customers phone number \n"
                    + " 4) Create/update text File \n"
                    + " 5) Read from File \n"
                    + " 6) Sort Customers age \n"
                    + " 7) Exit "));

            switch (choice) {

                case 1: input(Customer); printing(Customer); break;
                case 2: String get = JOptionPane.showInputDialog("Please enter Customers Phone number to make an order");
                    Customers x = Search(Customer, get); getting(Customer, x, get); items(); gettingTwo(Customer, get); break;
                case 3: update(Customer);break;
                case 4: cFile(Customer); break;
                case 5: readFile(Customer);
                    break;
                case 6:
                    sorting(Customer);
                    break;
                case 7: 
                    exit();
                    break;
            } // close switch
        } // close while

        } catch (Exception e) {
            System.out.println("Please enter numbers 1-7");
        } // end catch

    } //========================================================== close main method =================================================================

    public static void input(Customers[] Customer) {

        for (int i = 0; i < Customer.length; i++) {
            Customer[i] = new Customers();
            String name = JOptionPane.showInputDialog("please enter your name");
            String surname = JOptionPane.showInputDialog("please enter your surname");
            int age = Integer.parseInt(JOptionPane.showInputDialog("please enter your age"));
            String PhoneNumber = JOptionPane.showInputDialog("please enter your phone number");
            Customer[i] = new Customers(name, surname, age, PhoneNumber);
            
        } // close Customers for loop
       
    } // end input method 

    public static void printing(Customers[] Customer) {
        
         for (int i = 0; i < Customer.length; i++) {
            Customer[i].Printall();
        } // close print for loop
    } // end printing method

    public static void getting(Customers[] Customer, Customers x, String get) {

        if (x == null) { // PhoneNumber as null
            System.out.println("Could not find " + get);
            get = JOptionPane.showInputDialog("Please enter Customers Phone number again");
            x = Search(Customer, get);
            System.out.print("\nCustomer, ");
            x.printName();
            System.out.print(" would like to purchase a product\n");

        } //close if
        else {
            System.out.print("Customer, ");
            x.printName();
            System.out.print(" would like to purchase a product\n");
        } // close else if 
    } // close inner while 

    public static void gettingTwo(Customers[] Customer, String get) {

        int another;
            boolean h = true;
            while (h) {
                another = Integer.parseInt(JOptionPane.showInputDialog("Would another Customer like to make an order?\n"
                        + "1) Yes\n"
                        + "2) No"));
                if (another == 1) {
                    h = true;
                    String get2 = JOptionPane.showInputDialog("Please enter Customers Phone number to make an order");
                    Customers y = Search(Customer, get2);
                    if (y == null) {
                        System.out.println("Could not find " + get);
                        get = JOptionPane.showInputDialog("Please enter Customers Phone number again");
                        y = Search(Customer, get);
                        System.out.print("\nCustomer, ");
                        y.printName();
                        System.out.print(" would like to purchase a product\n");
                    } // close inner if
                    else {
                        System.out.print("\nCustomer, ");
                        y.printName();
                        System.out.print(" would like to purchase a product\n");
                    } // close inner else 
                    items();
                } // close outter if 
                else if (another == 2) {
                    h = false;
                } // close outer else if
             // close while loop 
        } // close outer while loop

    } // end gettingtwo method

    public static void items() {
        
        Vector productsVector=new Vector();
        productsVector.add("Iphone8");
         productsVector.add("Iphone6s");
          productsVector.add("Nokia8");
           productsVector.add("IphoneXS");
            productsVector.add("Galaxy S8");
            
          //  System.out.println("Products in stock are: " +  productsVector);
        
        String name = JOptionPane.showInputDialog("Products in stock are: "+ productsVector + "\n\nPlease enter the Products name");
        int price = Integer.parseInt(JOptionPane.showInputDialog("please enter products Price in Pounds"));

        Products Product = new Products(name, price);
        Product.Printall();
    } // close Items 

    public static Customers Search(Customers data[], String number) {

        for (int i = 0; i < data.length; i++) {

            if (data[i].getPhoneNumber().equals(number)) 
            {
                return data[i];
            } // close if 
        } // close for loop
        return null;
    } // close Search method

    public static void cFile(Customers[] Customer) {

        try {
            BufferedWriter out = new BufferedWriter(new FileWriter("Customers.txt"));
            for (int i = 0; i < arraySize; i++) {
                out.write("\n "+i+" Name: " + Customer[i].name);
                out.write("\n "+i+" Surname: " + Customer[i].surname);
                out.write("\n "+i+" Age: " + Customer[i].age);
                out.write("\n "+i+" Phone number: " + Customer[i].getPhoneNumber()+"\n");

            } // Close forloop
            out.close();
            System.out.println("File created");
        } // close try     
        catch (IOException e) {
            System.out.println("ERROR");
        } // close catch
    } // close readFile method

    public static void readFile(Customers[] Customer) throws Exception {
       
        try {
       FileReader read = new FileReader("Customers.txt") ; 
       BufferedReader reader = new BufferedReader(read);
       String x;
       while ((x=reader.readLine()) !=null) {
           out.println(x) ; 
       } // close while 
       reader.close();
        }  catch (IOException e) {
            out.println("File can not be found");
        } // end catch// close try 
    } // end readFile method

    public static void sorting(Customers customerArray[]) {

        System.out.println("\nCustomers lowest to highest age");

        int x = 1;
        for (int a = 0; a < arraySize; a++) {
            for (int c = 0; c < arraySize - x; c++) {
                if (customerArray[c].age > customerArray[c + 1].age) {
                    swap(customerArray, c, c + 1);
                } // close IF
                printAges(customerArray);
            } // close forloop
            x++;
        } // close outer for loop

    } // end sorting method

    public static void swap(Customers a[], int s1, int s2) {

        int temp;
        temp = a[s1].age;
        a[s1].age = a[s2].age;
        a[s2].age = temp;
    } // end swap method

    public static void printAges(Customers customerArray[]) {
        for (int c = 0; c < arraySize; c++) {
            System.out.println(customerArray[c].age);
        } // close for loop 

    } // end printArray method

    public static void update(Customers[] Customer) {

        int i = 0;
        System.out.println("Existing database\n");
        for (i = 0; i < Customer.length; i++) {
            System.out.println(Customer[i].name + "  " + Customer[i].surname + "  " + Customer[i].getPhoneNumber());
        } // end for loop
        String a = JOptionPane.showInputDialog("Which phone number would you like to update?");
        String b = JOptionPane.showInputDialog("Please enter the new phone number ");

        for (i = 0; i < Customer.length; i++) {
            if (Customer[i].getPhoneNumber().equals(a)) {
                Customer[i].setPhoneNumber(b);
                JOptionPane.showMessageDialog(null, " You are replacing " + a + " with " + Customer[i].getPhoneNumber());
                System.out.println("\n" + Customer[i].name + " new number is " + Customer[i].getPhoneNumber());
            }  // end  if

        } // end for loop
    } // end update method
    public static void exit() {
        
        System.out.println("\nThank You for using Hinesh's Java Project");
        System.exit(0);
    }
  
} // end main class 
