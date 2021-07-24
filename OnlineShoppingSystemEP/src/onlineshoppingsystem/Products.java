 /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package onlineshoppingsystem;

/**
 *
 * @author HKZ99
 */
public class Products {

    String name;
    int price;

    public Products() {
        name = " ";
        price = 0;
    }

    public Products(String n, int p) {

        name = n;
        price = p;
    }

    public void Printall() {
        System.out.println("\nProduct name: " + name);
        System.out.println("Price: £" + price);
    }
}
