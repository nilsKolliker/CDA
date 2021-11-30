using Microsoft.EntityFrameworkCore;
using PersonneAnimal.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Data.Services
{
    public class SexesServices
    {

        private readonly PersonneAnimalContext _context;

        public SexesServices(PersonneAnimalContext context)
        {
            _context = context;
        }

        public void AddSexe(Sexe obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Sexes.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteSexe(Sexe obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Sexes.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Sexe> GetAllSexes()
        {
            return _context.Sexes.Include("Personnes").ToList();
        }

        public Sexe GetSexeById(int id)
        {
            return _context.Sexes.Include("Personnes").FirstOrDefault(obj => obj.IdSexe == id);
        }

        public void UpdateSexe(Sexe obj)
        {
            _context.Update(obj);
            _context.SaveChanges();
        }


    }
}
