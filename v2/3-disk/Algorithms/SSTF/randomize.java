
/**
 * Randomize input.txt 
 *
 * @author (Matthew Morfea)
 * @version (4/21/21)
 */
import java.io.*;
import java.lang.*;
import java.util.*;
import java.io.File; 
import java.io.FileNotFoundException;  
import java.util.Scanner; 
public class randomize
{
    public static void main(String[] args) 
   {
       
        int[] arr = new int[100];
        ArrayList <Integer> arrlist= new ArrayList<Integer>();
        int x = 0; 
        int rand = (int)(Math.random() * 4) + 3;
        int[] queue = new int[rand];
        for(int i = 0; i < rand; i++)
        {
            queue[i] = (int)(Math.random() * 700) + 1;
            //System.out.println(queue[i]); 
        }
        int head = 50;
        
        writeToFile(queue, head);
   }
   public static void writeToFile(int[] q, int h)
   {
     try {
        FileWriter myWriter = new FileWriter("input.txt");
        myWriter.write("0 699" + "\n");
        myWriter.write(h + "\n");
        for(int i = 0; i < q.length;i++)
        {
            myWriter.write(q[i] + " ");
        }
        myWriter.close();
        //System.out.println("Successfully wrote to the file.");
     } catch (IOException e) {
        System.out.println("An error occurred.");
        e.printStackTrace();
     }
   }
}
