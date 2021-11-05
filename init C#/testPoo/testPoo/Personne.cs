using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace testPoo
{
    class Personne
    {
        private string nom;
        private string prenom;
        private int age;
        private string adresse;
        public int MyProperty { get; set; }

        public Personne(string nom, string prenom, int age, string adresse, int myProperty) : this(nom, prenom, age, adresse)
        {
            MyProperty = myProperty;
        }

        public Personne(string nom, string prenom, int age, string adresse)
        {
            this.nom = nom;
            this.prenom = prenom;
            this.age = age;
            this.adresse = adresse;
        }

        public string getNom()
        {
            return this.nom;
        }
        public string getPrenom()
        {
            return this.prenom;
        }
        public int getAge()
        {
            return this.age;
        }
        public string getAdresse()
        {
            return this.adresse;
        }

        public void setNom(string nom)
        {
            this.nom = nom;
        }
        public void setPrenom(string prenom)
        {
            this.prenom = prenom;
        }
        public void setAge(int age)
        {
            this.age = age;
        }
        public void setAdresse(string adresse)
        {
            this.adresse = adresse;
        }

    }
}
