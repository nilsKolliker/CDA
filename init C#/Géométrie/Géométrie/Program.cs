using System;

namespace Géométrie
{
    class Program
    {
        static void Main(string[] args)
        {
            Cercle cercle = new Cercle(2);
            Rectangle rectangle = new Rectangle(2, 2);
            TriangleRectangle triangle = new TriangleRectangle(3, 4);
            cercle.AfficherCercle();
            rectangle.AfficherRectange();
            triangle.AfficherTriangle();

            Console.WriteLine("---");

            Parallelepipede parallelepipede = new Parallelepipede(2, 2, 2);
            Pyramide pyramide = new Pyramide(2, 2, 2);
            Sphere sphere = new Sphere(2);
            parallelepipede.AfficherParallelepipede();
            pyramide.AfficherPyramide();
            sphere.AfficherSphere();
        }
    }
}
