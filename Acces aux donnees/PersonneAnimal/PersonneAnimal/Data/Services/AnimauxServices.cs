using Microsoft.EntityFrameworkCore;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Services
{
    public class AnimauxServices
    {

        private readonly PersonneAnimalContext _context;

        public AnimauxServices(PersonneAnimalContext context)
        {
            _context = context;
        }

        public void AddAnimal(Animal obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Animaux.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteAnimal(Animal obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Animaux.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Animal> GetAllAnimaux()
        {
            return _context.Animaux.Include("Adoptions.Personne.Sexe").ToList();
        }

        public Animal GetAnimalById(int id)
        {
            return _context.Animaux.Include("Adoptions.Personne.Sexe").FirstOrDefault(obj => obj.IdAnimal == id);
        }

        public void UpdateAnimal(Animal obj)
        {
            _context.Update(obj);
            _context.SaveChanges();
        }


    }
}
