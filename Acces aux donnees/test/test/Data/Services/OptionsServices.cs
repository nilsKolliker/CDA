using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test.Data.Models;

namespace test.Data.Services
{
    public class OptionsServices
    {
        private readonly MyDbContext _context;

        public OptionsServices(MyDbContext context)
        {
            _context = context;
        }
        public void AddOptions(Option option)
        {
            if (option == null)
            {
                throw new ArgumentNullException(nameof(option));
            }
            _context.Options.Add(option);
            _context.SaveChanges();
        }
        public void DeleteOptions(Option option)
        {
            if (option == null)
            {
                throw new ArgumentNullException(nameof(option));
            }
            _context.Options.Remove(option);
            _context.SaveChanges();
        }
        public IEnumerable<Option> GetAllOptions()
        {
            return _context.Options.ToList();
        }
        public Option GetOptionById(int id)
        {
            return _context.Options.FirstOrDefault(option => option.OptId == id);
        }
        public void UpdateOption(Option option)
        {
            _context.SaveChanges();
        }
    }
}
