namespace OOP
{
    public class TestProgram
    {
        static void Main(string[] args)
        {
            // Testarea clasei Cerc
            Circle cerc1 = new Circle(10);
            Console.Write("Aria cercului este: ");
            cerc1.Area();
            Console.WriteLine(cerc1.ToString());
            Console.Write("Perimetrul cercului este: ");
            cerc1.Perimeter();
            Console.WriteLine(cerc1.ToString());

            // Testarea clasei Dreptunghi
            Rectangle rect1 = new Rectangle(2, 3);
            Console.Write("Aria dreptunghiului este: ");
            rect1.Area();
            Console.WriteLine(rect1.ToString());
            Console.Write("Perimetrul dreptunghiului este: ");
            rect1.Perimeter();
            Console.WriteLine(rect1.ToString());

            // Testarea functionalitatii de desenare

        }
    }
}
